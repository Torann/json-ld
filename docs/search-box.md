# Search Box

With Google Sitelinks search box, from search results. Search users sometimes use navigational queries, typing in the brand name or URL of a known site or app, only to do a more detailed search once they reach their destination. For example, users searching for pizza pins on Pinterest would type Pinterest or pinterest.com into Google Search--either from the Google App or from their web browser--then load the site or Android app, and finally search for pizza.

## Example

```php
$context = \JsonLd\Context::create('search_box', [
    'url' => 'https://www.example.com/',
    'potentialAction' => [
        'target' => 'https://query.example.com/search?q={search_term_string}',
        'query-input' => 'required name=search_term_string',
    ],
]);
```

**Output**

```javascript
<script type="application/ld+json">
{
  "@context": "http:\/\/schema.org",
  "@type": "WebSite",
  "url": "https:\/\/www.example.com\/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https:\/\/query.example.com\/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
```