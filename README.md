# WSU / WNPA Syndication

### WSUWP Single Site Dev Configuration

If using in combination with WSUWP Single Site Dev, ensure the following is in the `projects.sls` pillar file:

```
wp-single-projects:
  wnpa.wsu.edu:
    name: wnpa.wsu.edu
    database: wsu_wnpa
```

## Terminology

* Feed Item
* External Source
* Consume
* Visibility