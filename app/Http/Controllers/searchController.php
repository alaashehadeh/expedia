<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class searchController extends Controller
{
    public function getOffers(Request $request)
    {
        $url = 'https://offersvc.expedia.com/offers/v2/getOffers?scenario=deal-finder&page=foo&uid=foo&productType=Hotel';

        //search by city name
        if ($request->city)
            $url .= '&destinationName=' . $request->city;

        //search by min hotel stars
        if ($request->star_from)
            $url .= '&minStarRating=' . $request->star_from;

        //search by max hotel stars
        if ($request->star_to)
            $url .= '&maxStarRating=' . $request->star_to;

        //search by min rate stars
        if ($request->rate_from)
            $url .= '&minTotalRate=' . $request->rate_from;

        //search by min rate stars
        if ($request->rate_to)
            $url .= '&maxTotalRate=' . $request->rate_to;

        //search by min guest stars
        if ($request->guest_from)
            $url .= '&minGuestRating=' . $request->guest_from;

        //search by min guest stars
        if ($request->guest_to)
            $url .= '&maxGuestRating=' . $request->guest_to;

        //search by min guest stars
        if ($request->stay)
            $url .= '&lengthOfStay=' . $request->stay;

        //get content
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        $data = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $data = (object)json_decode($data);
        if(!@$data->offers->Hotel)
            $output = Array();
        else {
            $data = $data->offers->Hotel;
            $output = $this->hotelsOutput($data);
        }
        return view('search')->with('result',$output);
    }

    public function hotelsOutput($data)
    {
        $output = array();
        foreach ($data as $key => $value) {
            $output[$key]['name'] = $value->hotelInfo->hotelName;
            $output[$key]['description'] = $value->hotelInfo->description;
            $output[$key]['hotelGuestReviewRating'] = $value->hotelInfo->hotelGuestReviewRating;
            $output[$key]['hotelStarRating'] = $value->hotelInfo->hotelStarRating;
            $output[$key]['hotelImageUrl'] = $value->hotelInfo->hotelImageUrl;
            $output[$key]['travelStartDate'] = $value->hotelInfo->travelStartDate;
            $output[$key]['travelEndDate'] = $value->hotelInfo->travelEndDate;
            $output[$key]['lengthOfStay'] = $value->offerDateRange->lengthOfStay;
            $output[$key]['destination'] = $value->destination->country.', '.$value->destination->city;
            $output[$key]['totalPriceValue'] = $value->hotelPricingInfo->totalPriceValue;
            $output[$key]['originalPricePerNight'] = $value->hotelPricingInfo->originalPricePerNight;
            $output[$key]['averagePriceValue'] = $value->hotelPricingInfo->averagePriceValue;
            $output[$key]['currency'] = $value->hotelPricingInfo->currency;
            $output[$key]['percentSavings'] = $value->hotelPricingInfo->percentSavings;
            $output[$key]['hotelInfositeUrl'] = urldecode($value->hotelUrls->hotelInfositeUrl);
        }
        return $output;
    }
}
