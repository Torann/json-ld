<?php

namespace JsonLd\Test\ContextTypes;

use JsonLd\Test\TestCase;

class PersonTest extends TestCase
{
    protected $class = \JsonLd\ContextTypes\Person::class;

    protected $attributes = [
        'name' => 'Anonymous tester',
        'description' => 'a man in the middle',
        'mainEntityOfPage' => [
            'url' => 'https://example.com/anonymous.html'
        ],
        'image' => [
            'url' => 'https://google.com/Doctor.jpg',
            'height' => 800,
            'width' => 800
        ],
        'additionalName' => 'phpUnit hacker',
        'address' => [
            'addressLocality' => 'Paris',
            'addressCountry' => 'France'
        ],
        'award' => 'phpUnit Excellence',
        'birthDate' => '1943-10-04T00:00',
        'birthPlace' => ['name' => 'Paris'],
        'deathDate' => '2013-10-04T00:00',
        'deathPlace' => ['name' => 'London'],
        'email' => 'toto@yoyo.fr',
        'familyName' => 'Dupondt',
        'faxNumber' => '0000000000',
        'follows' => [ 'name' => 'strange follower' ],
        'givenName' => 'Doctor',
        'homeLocation' => [
            'name' => 'Fluff Hut',
            'address' => [
                'streetAddress' => '112 Apple St.',
                'addressLocality' => 'Hamden',
                'addressRegion' => 'CT',
                'postalCode' => '06514',
          ],
        ],
        'jobTitle' => 'tester',
        'parent' => [ 'name' => 'daddy' ],
        'telephone' => '+330102030405'

    ];

    public function test_should_have_properties() {

        $this->assertPropertyEquals('name', 'Anonymous tester');

        $this->assertPropertyEquals('description', 'a man in the middle');

        $this->assertPropertyEquals('mainEntityOfPage',
            [
                '@type' => 'WebPage',
                '@id' => 'https://example.com/anonymous.html',
            ]);

        $this->assertPropertyEquals('image',
            [
                '@type' => 'ImageObject',
                'url' => 'https://google.com/Doctor.jpg',
                'height' => 800,
                'width' => 800,
            ]);

        $this->assertPropertyEquals('additionalName', 'phpUnit hacker');

        $this->assertPropertyEquals('address',
            [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Paris',
                'addressCountry' => 'France'
            ]);

        $this->assertPropertyEquals('award', 'phpUnit Excellence');

        $this->assertPropertyEquals('birthDate', '1943-10-04T00:00');

        $this->assertPropertyEquals('birthPlace',
            [
                '@type' => 'Place',
                'name' => 'Paris',
            ]);

        $this->assertPropertyEquals('deathDate', '2013-10-04T00:00');

        $this->assertPropertyEquals('deathPlace',
            [
                '@type' => 'Place',
                'name' => 'London',
            ]);

        $this->assertPropertyEquals('email', 'toto@yoyo.fr');

        $this->assertPropertyEquals('familyName', 'Dupondt');

        $this->assertPropertyEquals('faxNumber', '0000000000');

        $this->assertPropertyEquals('follows',
            [
                '@type' => 'Person',
                'name' => 'strange follower'
            ]);

        $this->assertPropertyEquals('givenName', 'Doctor');

        $this->assertPropertyEquals('homeLocation',
            [
                '@type' => 'Place',
                'name' => 'Fluff Hut',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '112 Apple St.',
                    'addressLocality' => 'Hamden',
                    'addressRegion' => 'CT',
                    'postalCode' => '06514',
                ],
            ]
        );

        $this->assertPropertyEquals('jobTitle', 'tester');

        $this->assertPropertyEquals('parent',
            [
                '@type' => 'Person',
                'name' => 'daddy'
            ]);

        $this->assertPropertyEquals('telephone', '+330102030405');
    }

}