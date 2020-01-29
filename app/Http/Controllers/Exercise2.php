<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Exercise2 extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $students = [
            2125600 => [
                'ID' => 2125600,
                'Title' => 'Miss',
                'LastName' => 'Adu',
                'FirstName' => 'Christiana',
                'OtherName' => null,
                'Gender' => 'Female',
                'DateofBirth' => '6/30/1981',
                'PlaceofBirth' => 'Tema',
            ],
            2125620 => [
                'ID' => 2125620,
                'Title' => 'Miss',
                'LastName' => 'Abgeko',
                'FirstName' => 'Mavis',
                'OtherName' => null,
                'Gender' => 'Female',
                'DateofBirth' => null,
                'PlaceofBirth' => 'Kumasi',
            ],
            2125631 => [
                'ID' => 2125631,
                'Title' => 'Mrs',
                'LastName' => 'Afrifa',
                'FirstName' => 'Yvette',
                'OtherName' => 'Akousa',
                'Gender' => 'Female',
                'DateofBirth' => '10/25/1987',
                'PlaceofBirth' => 'Acera',
            ],
            2125642 => [
                'ID' => 2125642,
                'Title' => 'Mr',
                'LastName' => 'Arthur',
                'FirstName' => 'John',
                'OtherName' => 'Kingsley',
                'Gender' => 'Male',
                'DateofBirth' => '3/14/1993',
                'PlaceofBirth' => 'Mankesim',
            ],
            2125633 => [
                'ID' => 2125633,
                'Title' => 'Mr',
                'LastName' => 'Ofori',
                'FirstName' => 'Amanfo',
                'OtherName' => 'Emmaneul',
                'Gender' => 'Male',
                'DateofBirth' => '1/12/1991',
                'PlaceofBirth' => 'Sefwi Wiaso',
            ],
            2125624 => [
                'ID' => 2125624,
                'Title' => 'Miss',
                'LastName' => 'Aidoo',
                'FirstName' => 'Patience',
                'OtherName' => null,
                'Gender' => 'Female',
                'DateofBirth' => '5/15/1978',
                'PlaceofBirth' => 'Tarkwa',
            ],
            2125627 => [
                'ID' => 2125627,
                'Title' => 'Miss',
                'LastName' => 'Akafia',
                'FirstName' => 'Lawrencia',
                'OtherName' => null,
                'Gender' => 'Female',
                'DateofBirth' => '6/4/1980',
                'PlaceofBirth' => 'Acera',
            ],
            2125677 => [
                'ID' => 2125677,
                'Title' => 'Mrs',
                'LastName' => 'Okoe',
                'FirstName' => 'Theodora',
                'OtherName' => null,
                'Gender' => 'Female',
                'DateofBirth' => '7/14/1984',
                'PlaceofBirth' => 'Sandema',
            ],
            2125648 => [
                'ID' => 2125648,
                'Title' => 'Mr',
                'LastName' => 'Ampofo',
                'FirstName' => 'David',
                'OtherName' => null,
                'Gender' => 'Male',
                'DateofBirth' => null,
                'PlaceofBirth' => 'Navrongo',
            ],
            2125611 => [
                'ID' => 2125611,
                'Title' => 'Mr',
                'LastName' => 'Poku',
                'FirstName' => 'Kwame',
                'OtherName' => 'Nana',
                'Gender' => 'Male',
                'DateofBirth' => '11/13/1984',
                'PlaceofBirth' => 'Tamale',
            ],
            2125610 => [
                'ID' => 2125610,
                'Title' => 'Miss',
                'LastName' => 'Opoku',
                'FirstName' => 'Berlinda',
                'OtherName' => null,
                'Gender' => 'Female',
                'DateofBirth' => '9/23/1991',
                'PlaceofBirth' => 'Wenchi',
            ],
            2125688 => [
                'ID' => 2125688,
                'Title' => 'Mr',
                'LastName' => 'Danso',
                'FirstName' => null,
                'OtherName' => 'Prosper',
                'Gender' => 'Male',
                'DateofBirth' => '12/10/1982',
                'PlaceofBirth' => 'Koforidua',
            ],
        ];
        $r = json_decode($request->getContent(), true);
        switch(Validator::make($r, ['id' => 'required|numeric'])->fails()) {
            case false: {
                switch(@$students[@$r['id']]) {
                    case true: {
                        $student = (object) @$students[@$r['id']];
                        return response()->json(
                            [
                                'ID' => $student->ID,
                                'Full Name' => ($student->Title == 'Miss' ? $student->Title : $student->Title . '.') . ' ' . $student->LastName . ($student->FirstName ? ', ' : '') . $student->FirstName,
                                'Other Name' => $student->OtherName ?? 'None',
                                'Date Of Birth' => $student->DateofBirth,
                                'Place Of Birth' => $student->PlaceofBirth
                            ],
                            200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT
                        );
                        break;
                    }
                    default: {
                        return response()->json(['response' => 'not found'], 404, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                    }
                }

            }
            default: {
                return response()->json(
                    ['response' => 'bad request'],
                    400, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT
                );
            }
        }
    }
}
