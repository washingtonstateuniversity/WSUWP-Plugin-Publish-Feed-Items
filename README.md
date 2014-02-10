# WSU / WNPA Syndication

WNPA Syndication is a plugin for WordPress used to managed and republish content from many external sources into one consumable feed.

Once the plugin is installed, two additional menu items will be available in the left bar - Feed Items and External Sources.

## External Sources

External sources can be any standard RSS feed. For the WNPA, these are the feeds of weekly newspapers throughout the state of Washington.

While any standard feed can be used, we do look for custom item tags in the feed to help categorize items and assign visibility.

* [dc:accessRights](http://purl.org/dc/terms/accessRights) can be set to either `public` or `private` in a feed to indicate the visibility of an item to the general public.
    * Default: `public`

External sources are added and managed through the corresponding menu option in WordPress. The only input field available when adding an external source is it's URL, which should be something like `http://news.wsu.edu/feed/`.

As soon as an external source is entered and saved, information indicating success or failure of item retrieval will be shown.

## Terminology


* Feed Item
* External Source
* Consume
* Visibility
