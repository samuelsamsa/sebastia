Use this as your `README.md`:

```md
# Sebastia (Kirby CMS)

This repository contains the source code and content for the Sebastia website, built with [Kirby CMS](https://getkirby.com/).

## Tech Stack

- Kirby CMS (PHP-based flat-file CMS)
- PHP
- Custom templates/snippets
- Custom CSS and JavaScript

## Repository Structure

- `site/`  
  Templates, snippets, controllers, config, blueprints, languages
- `content/`  
  Page content and media assets
- `assets/`  
  Frontend CSS, JS, fonts, images
- `kirby/`  
  Kirby core files
- `media/`  
  Generated runtime files (not tracked)

## Local Development

### Requirements

- PHP 8.x
- Git
- Git LFS (for media in `content/`)

### Run locally

From project root:

```bash
php -S localhost:8000 kirby/router.php
```

Then open:  
`http://localhost:8000`

## Git LFS and Media

This repo uses Git LFS for heavy media files in `content/`.

### One-time setup

```bash
git lfs install
git lfs pull
```

If you clone the repo without LFS, media files may appear as pointer text files until `git lfs pull` is run.

## Important: Ignored Runtime Folders

These are intentionally excluded from version control:

- `media/`
- `site/cache/`
- `site/sessions/`

They are generated at runtime and should not be committed.

## Current Environment Status

- No permanent public live/staging URL is currently configured.
- Source of truth is this repository plus local development environment.

## Notes for Handover / External Review

For technical review (e.g. hosting, deployment, maintenance), reviewers should focus on:

1. Kirby/PHP hosting requirements
2. Deployment workflow
3. Backup strategy for `content/`
4. Access/control model for CMS usage
5. Staging environment setup
