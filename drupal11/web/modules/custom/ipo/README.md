# IPO — Drupal 11 Practice Module

This module is designed as a runnable practice/lab module, not as a production feature module.

## Included practice areas

- Plugins and plugin derivatives
- Forms and Form API
- AJAX forms
- Controllers and routing
- Access API
- Cache API and cache metadata
- Render API
- Twig and preprocess
- Services and dependency injection
- Event subscribers
- Queue API
- Cron
- Batch API
- Migrate API source plugin
- Views integration (`hook_views_data()`)
- REST/JSON:API compatibility through Drupal's installed modules
- Typed Data / Field API practice notes via Drupal entity APIs
- Translation with `t()` and configuration labels
- Configuration management and schema
- Update and post-update hooks
- Drush command
- PHPUnit Unit/Kernel tests
- Performance and security patterns

## Install

Copy `ipo` into `web/modules/custom/ipo` (or your Drupal site's custom modules directory), then:

```bash
drush en ipo -y
drush cr
drush ipo:hello
```

Visit `/ipo`.

## Important Drupal 11 notes

1. This module deliberately uses Drupal's standard discovery annotations for the plugin examples so it remains easy to study alongside existing Drupal 11 codebases.
2. The migrate source plugin is a demonstration source. It is not intended to import business data by itself.
3. JSON:API is exposed through Drupal's core JSON:API module. The module does not create a duplicate JSON:API implementation.
4. The Views integration demonstrates the Views data API. Create a View and inspect available IPO fields after enabling the module.
5. For a real project, run the module's tests in a Drupal test environment and run PHPStan/Drupal coding standards as part of CI.

## Security/performance patterns

- Permissions are required on administrative routes.
- Custom access returns cacheable access metadata.
- Render arrays carry cache contexts/tags/max-age.
- Configuration is stored through Config API rather than arbitrary state.
- User-controlled output is passed through Twig or Drupal's translation/rendering APIs.
- Services use dependency injection rather than static service lookups where practical.
- Queue work is deferred instead of being performed in a page request.
