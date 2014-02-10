# WNPA Syndication

WNPA Syndication is a [WordPress](http://wordpress.org) plugin used to manage and republish content from multiple external sources into a single consumable feed.

## Overview

The primary objective for WNPA Syndication is to ease the sharing of news stories between several organizations.

This plugin offers a central area for content from multiple external sources to be stored. This content is then republished through a single feed that can be used by any of those sources to augment local news collections.

### External Sources

External sources can be any standard [RSS](http://cyber.law.harvard.edu/rss/rss.html) feed. At [WNPA](http://www.wnpa.com/), these are the feeds of weekly newspapers throughout the state of Washington.

External sources are added and managed through the corresponding menu option in WordPress.

1. Go to **External Sources** -> **Add New** in the left menu.
1. Enter a valid RSS feed URL in **Feed URL**
    * e.g. `http://news.wsu.edu/feed/`
1. Click **Save Draft** if you would like to save the source without retrieving items yet.
1. Click **Publish** or **Update** if the items from this source should be published.

As soon as an external source is entered and saved, information indicating success or failure of item retrieval will be shown.

#### Additional Feed Attributes

While any standard feed can be used, we also look for specific elements in the feed to help categorize items and assign visibility.

* [category](http://cyber.law.harvard.edu/rss/rss.html#ltcategorygtSubelementOfLtitemgt) Category elements with no specified domain will be used to assign general tags to feed items.
* [category domain="wnpalocation"](http://cyber.law.harvard.edu/rss/rss.html#ltcategorygtSubelementOfLtitemgt)  Category elements with the `wnpalocation` domain assigned will be recognized under a location taxonomy.
* [dc:accessRights](http://purl.org/dc/terms/accessRights) (Default `public`) Can be set to either `public` or `private` in a feed to indicate the visibility of an item to the general public.

These same attributes are provided in the RSS feeds produced by WNPA Syndication.

### Feed Items

Feed items are the individual articles pulled in through the external source RSS feed and can be accessed under the **Feed Items** menu in WordPress. Once these items have been pulled in, they are republished through a central feed such as `http://wnpa.wsu.edu/feed-items/feed/`.

By default, only feed items that have a visibility of `public` will be shown in this central feed. To see items in a feed that have been marked as `private`, an access key is required.

### Access Keys

Access keys are used in combination with the central feed to gain access to items that have been marked as private. Each user has the ability to generate their own access key through their profile.

1. Go to **Users** -> **Your Profile** in the left menu.
1. Scroll to the bottom of your profile page. **WNPA Access Information** should be listed.
1. Click **Generate** to populate the field for **Access Key**.
1. Click **Update Profile** at the bottom.
1. Copy the generated **Feed URL** that now has an appended access key.
    * e.g. `http://wnpa.wsu.edu/feed-items/feed/?access_key=154379977f67e13d26c77fd519ce5124`