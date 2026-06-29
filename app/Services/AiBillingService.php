<?php

namespace App\Services;

use App\Models\Team;

class AiBillingService
{
    private string $apiKey;
    private string $model;

    public function __construct()
    {
        $this->apiKey = config('services.anthropic.key', '');
        $this->model  = config('services.anthropic.model', 'claude-sonnet-4-6');
    }

    public function analyzeSpend(Team $team, array $usageSummary): array
    {
        if (empty($this->apiKey)) {
            return [
                'insights'    => [
                    'Usage is within normal range for your plan.',
                    'Consider upgrading to Pro to unlock unlimited API calls.',
                ],
                'savings_zar' => 0,
                'tokens_used' => 0,
            ];
        }

        $prompt = "You are a billing intelligence AI for the InfoDot ecosystem.\n\n" .
            "Team: {$team->name}\n" .
            "Usage summary: " . json_encode($usageSummary) . "\n\n" .
            "Analyse this spend data and return JSON: {\"insights\": [\"...\",\"...\"], \"savings_zar\": <number>}";

        $response = $this->callClaude($prompt);
        $decoded  = json_decode($response, true);

        return [
            'insights'    => $decoded['insights'] ?? [],
            'savings_zar' => $decoded['savings_zar'] ?? 0,
            'tokens_used' => 0,
        ];
    }

    private function callClaude(string $prompt): string
    {
        $ch = curl_init('https://api.anthropic.com/v1/messages');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_HTTPHEADER     => [
                'x-api-key: ' . $this->apiKey,
                'anthropic-version: 2023-06-01',
                'content-type: application/json',
            ],
            CURLOPT_POSTFIELDS => json_encode([
                'model'      => $this->model,
                'max_tokens' => 512,
                'messages'   => [['role' => 'user', 'content' => $prompt]],
            ]),
        ]);
        $body = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($body, true);
        return $data['content'][0]['text'] ?? '{}';
    }
}
