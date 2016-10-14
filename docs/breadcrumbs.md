# Breadcrumbs

Breadcrumb trails on a page indicate the page's position in the site hierarchy. A user can navigate all the way up in the site hierarchy, one level at a time, by starting from the last breadcrumb in the breadcrumb trail.

## Example

```php
$context = \JsonLd\Context::create('breadcrumb_list', [
    'itemListElement' => [
        [
            'url' => 'https://example.com/arts',
            'name' => 'Arts',
        ],
        [
            'url' => 'https://example.com/arts/books',
            'name' => 'Books',
        ],
        [
            'url' => 'https://example.com/arts/books/poetry',
            'name' => 'Poetry',
        ],
    ]
]);
```

**Output**

```javascript
<script type="application/ld+json">
{
  "@context": "http:\/\/schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "https:\/\/example.com\/arts",
        "name": "Arts"
      }
    },
    {
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "https:\/\/example.com\/arts\/books",
        "name": "Books"
      }
    },
    {
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@id": "https:\/\/example.com\/arts\/books\/poetry",
        "name": "Poetry"
      }
    }
  ]
}
</script>
```