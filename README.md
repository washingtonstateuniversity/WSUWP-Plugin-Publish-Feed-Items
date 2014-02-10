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

## Feed Items

Feed items are the individual articles pulled in through the external source RSS feed and can be accessed under the Feed Items menu in WordPress.

As soon as these items are available to us, they are republished through a central feed such as `http://wnpa.wsu.edu/feed-items/feed/` to be consumed by others that have access.

By default, only feed items that have a visibility of `public` will be shown. To see items in a feed that have been marked as `private`, an access key is required.

## Access Keys

Access keys are used in combination with the central feed to gain access to items that have been marked as private. Each user has the ability to generate their own access key through their profile.

1. Go to **Users** -> **Your Profile** in the left menu.
1. Scroll to the bottom of your profile page. **WNPA Access Information** should be listed.
1. Click **Generate** to populate the field for **Access Key**.
1. Click **Update Profile** at the bottom.
1. Copy the generated **Feed URL** that now has an appended access key.
    * e.g. `http://wnpa.wsu.edu/feed-items/feed/?access_key=154379977f67e13d26c77fd519ce5124`