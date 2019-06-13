<?php

namespace App\Http\Controllers;

use harmonic\Ezypay\Facades\Ezypay;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CustomersController extends Controller {
    public function index() {
        //$customers = Ezypay::getCustomers(false, null, null, null, null, null, null, null, null, 25, 0);
        //dd($customers);
        $customers = [
            [
              'id' => '056b2127-b456-419c-a193-a3abe42c1ca5',
              'number' => 'EZY1000655288',
              'referenceCode' => null,
              'firstName' => 'Accounts',
              'lastName' => 'Payable',
              'email' => 'accounts.payable@aspermont.com',
              'companyName' => 'ASPERMONT LIMITED',
              'mobilePhone' => null,
              'homePhone' => null,
              'gender' => null,
              'dateOfBirth' => null,
              'createdOn' => '2019-06-10T05:57:43.842',
              'address' => [
                'address1' => '613 - 619 Wellington Street',
                'address2' => '',
                'postalCode' => '6000',
                'state' => 'WA',
                'countryCode' => 'AU',
                'city' => 'Perth',
              ],
              'metadata' => [
                'identifierID' => 6,
                'identifierType' => "ShareLink\Models\Client",
              ]
              ],
            [
              'id' => '3fc6b6ec-690c-4c7a-9658-5cdeaae4e89b',
              'number' => 'EZY1000631559',
              'referenceCode' => null,
              'firstName' => 'Craig',
              'lastName' => 'Harman',
              'email' => 'craig@harmonic.com.au',
              'companyName' => 'SONIC HEALTHCARE LIMITED',
              'mobilePhone' => null,
              'homePhone' => null,
              'gender' => null,
              'dateOfBirth' => null,
              'createdOn' => '2019-05-13T03:29:06.489',
              'address' => [
                'address1' => '369 Newcastle Street',
                'address2' => '',
                'postalCode' => '6003',
                'state' => 'wa',
                'countryCode' => 'AU',
                'city' => 'Northbridge',
              ],
              'metadata' => [
                'identifierID' => 1,
                'identifierType' => "ShareLink\Models\Client",
              ]
              ],
            [
              'id' => '0e88e2b4-965c-4829-a2ae-4db13570c8b3',
              'number' => 'EZY1000652004',
              'referenceCode' => null,
              'firstName' => 'George',
              'lastName' => 'Ventouras',
              'email' => 'george@apolloconsolidated.com.au',
              'companyName' => 'APOLLO CONSOLIDATED LIMITED',
              'mobilePhone' => null,
              'homePhone' => null,
              'gender' => null,
              'dateOfBirth' => null,
              'createdOn' => '2019-06-05T08:05:58.437',
              'address' => [
                'address1' => 'Level 4, The Read Building',
                'address2' => '16 Milligan Street',
                'postalCode' => '6000',
                'state' => 'WA',
                'countryCode' => 'AU',
                'city' => 'Perth',
              ],
              'metadata' => [
                'identifierID' => 4,
                'identifierType' => "ShareLink\Models\Client",
              ]
              ],
            [
              'id' => '5c2da079-0c0c-442f-ad4b-b6f9e6d0c6ac',
              'number' => 'EZY1000658693',
              'referenceCode' => null,
              'firstName' => 'Joe',
              'lastName' => 'Corrigan',
              'email' => 'joecorrigan@mac.com',
              'companyName' => 'WEBSTER LIMITED',
              'mobilePhone' => null,
              'homePhone' => null,
              'gender' => null,
              'dateOfBirth' => null,
              'createdOn' => '2019-06-12T03:33:33.267',
              'address' => [
                'address1' => '61 Kurrajong Avenue',
                'address2' => '',
                'postalCode' => '2705',
                'state' => 'NSW',
                'countryCode' => 'AU',
                'city' => 'Leeton',
              ],
              'metadata' => [
                'identifierID' => 8,
                'identifierType' => "ShareLink\Models\Client",
              ]
            ],
            [
              'id' => 'eacebeb3-9820-41dc-ad58-0bb0736df43a',
              'number' => 'EZY1000642948',
              'referenceCode' => null,
              'firstName' => 'Linda',
              'lastName' => 'Komatsubara',
              'email' => 'linda.komatsubara@speedcast.com',
              'companyName' => 'SPEEDCAST INTERNATIONAL LTD',
              'mobilePhone' => null,
              'homePhone' => null,
              'gender' => null,
              'dateOfBirth' => null,
              'createdOn' => '2019-05-27T07:49:22.417',
              'address' => [
                'address1' => 'Unit 4F, Level 1, Lakes Business Park',
                'address2' => '12 Lord Street',
                'postalCode' => '2019',
                'state' => 'NSW',
                'countryCode' => 'AU',
                'city' => 'Botany',
              ],
              'metadata' => [
                'identifierID' => 3,
                'identifierType' => "ShareLink\Models\Client",
              ]
            ],
          ];
        return Inertia::render('Customers/Index', ['customers' => $customers]);
    }
}
