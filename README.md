<div align="center">

<img src="docs/logo.svg" alt="Dot.Billing" width="320" />

<br /><br />

**Manage plans, track invoices, and analyse spend across the Dot ecosystem.**

<br />

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php&logoColor=white) ![Livewire](https://img.shields.io/badge/Livewire-3-FB70A9?style=flat-square) ![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-336791?style=flat-square&logo=postgresql&logoColor=white)

<br /><br />

**Part of the [InfoDot Ecosystem](https://github.com/sakhileb/InfoDot)** &nbsp;·&nbsp; `billing.infodot.app`

</div>

---

## What is Dot.Billing?

Dot.Billing is the subscription and billing management platform in the InfoDot ecosystem. Teams track their active plans, receive and pay invoices, monitor cross-platform usage, and get AI-powered spend optimisation recommendations — all in one billing intelligence hub.

## Core Features

- Subscription management — plans, billing cycles, and trial tracking
- Invoice generation and payment tracking with Stripe
- Usage-based billing — API calls, storage, and seat consumption per platform
- Payment methods — store and manage cards and EFT details
- Account credits and adjustment notes
- Budget alerts — configurable thresholds with notification triggers
- AI spend analysis — Claude-powered cost optimisation recommendations
- Ecosystem SSO from InfoDot hub

## Domain Models

- **BillingPlan** — subscription tier with features and pricing
- **BillingSubscription** — team-to-plan mapping with status
- **BillingInvoice** — generated invoice with line items
- **BillingUsageRecord** — per-platform metric consumption

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 |
| Language | PHP 8.4 |
| Frontend | Livewire 3 · Alpine.js 3 · Tailwind CSS |
| Database | PostgreSQL 16 (shared across ecosystem) |
| Realtime | Laravel Reverb |
| Auth | Laravel Sanctum (InfoDot SSO) |
| AI | Anthropic Claude (`claude-sonnet-4-6`) |
| Storage | AWS S3 / Local (Flysystem) |
| Search | Laravel Scout · Meilisearch |
| Queue | Redis · Laravel Horizon |

## Quick Start

```bash
git clone https://github.com/sakhileb/Dot.Billing.git
cd Dot.Billing
cp .env.example .env
composer install
npm install && npm run build
php artisan key:generate
php artisan migrate
php artisan serve
```

> **Ecosystem SSO:** Set `DB_*` env vars to the shared InfoDot PostgreSQL instance and `APP_URL=https://billing.infodot.app`. Users authenticated through InfoDot gain access automatically via Sanctum handoff tokens.

## Ecosystem

**Dot.Billing** is one of **21 platforms** in the InfoDot ecosystem, connected via shared PostgreSQL and Sanctum SSO. Visit [InfoDot](https://github.com/sakhileb/InfoDot) to explore the full platform map.

## License

MIT © [SK Digital / BluPin Incorporated](https://github.com/sakhileb)
