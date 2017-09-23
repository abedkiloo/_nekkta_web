<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\_nektta_feedsModel;
use Intervention\Image\Facades\Image;


class _nekkta_feedsController extends Controller
{
    //
//    public function __construct()
//
//    {
//
//        $this->middleware('auth');
//
//    }

    public function view_redirect($direct_to)
    {


        switch ($direct_to) {
            case "feeds_create":
                return view('file_upload');
                break;
        }
        return back();
    }

    public function feeds_upload_details(Request $req)
    {
        //intilaze the uplooad of feeds details
        $feeds = new _nektta_feedsModel;

        // getting the values sent for upload
        $u_feed_name = $req->input('feed_name');
        $u_feed_description1 = $req->input('desc_1');
        $u_feed_description2 = $req->input('desc_2');

        //creating an object which can be saved into the server
        $feeds->feed_name = $u_feed_name;
        $feeds->feed_description_1 = $u_feed_description1;
        $feeds->feed_description_2 = $u_feed_description2;


        //checking whether the request contains a file which needs to be uploaded
        if ($req->hasFile('feed_image')) {

            //getting the image and compressing it to obtain a minized image
            $file = $req->file('feed_image');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'public/images';

            $img = Image::make($file)->resize(200, 200);
            //saving the image in a directory
            $img->save($destinationPath . '/' . $filename);


            $location_desc = $destinationPath . '/' . $filename;
            $feeds->feed_picture = $location_desc;
        }

        $feeds->save();
        return "success";
    }

    /**
     * @param $request_from
     * function ti get feeds and return response to web client
     */
    public function web_feeds_query($request_from)
    {
        $get_feeds_download = _nektta_feedsModel::all();
        $this->feeds_download($get_feeds_download, $request_from);
    }

    /**
     * @param $request_from
     * @param $start_id
     * @param $end_id
     * @return string
     *
     * method to get feed request from the an application
     */

    public function app_feeds_query($request_from, $start_id, $end_id)
    {

        //getting the cout of alll elements in feeds table
        $feed_count = _nektta_feedsModel::count();
        if ($feed_count > $end_id) {
            $get_feeds_download = _nektta_feedsModel::where('id', '>=', $start_id)
                ->where('id', '<=', $end_id)->get();
            $this->feeds_download($get_feeds_download, $request_from);
        } else {

            //return an empty json since to minimize more invalid requests
            $feeds["feeds"] = array();
            return json_encode($feeds, JSON_UNESCAPED_SLASHES);

        }


    }

    /**
     * @param $get_feeds_download
     * @param $request_from
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     *
     * method to return the json to
     */

    public function feeds_download($get_feeds_download, $request_from)
    {
        switch ($request_from) {
            case 'web':
                return view('show_feeds', compact('get_feeds_download', 'str_pic'));
                break;
            case 'app':
                $feeds["feeds"] = array();

                //creating an array
                for ($i = 0; $i < count($get_feeds_download); $i++) {
                    $feed['id'] = $get_feeds_download[$i]->id;
                    $feed['image'] = $get_feeds_download[$i]->feed_picture;
                    $feed['feed_name'] = $get_feeds_download[$i]->feed_name;
                    $feed['feed_description_1'] = $get_feeds_download[$i]->feed_description_1;
                    $feed['feed_description_2'] = $get_feeds_download[$i]->feed_description_2;
                    $feed['feed_picture'] = $get_feeds_download[$i]->feed_picture;
                    $feed['feed_icon'] = $get_feeds_download[$i]->feed_icon;
                    $feed['feed_group_id'] = $get_feeds_download[$i]->feed_group_id;
                    $feed['created_at'] = $get_feeds_download[$i]->created_at;
                    $feed['updated_at'] = $get_feeds_download[$i]->updated_at;
                    array_push($feeds["feeds"], $feed);
                }

                return json_encode($feeds, JSON_UNESCAPED_SLASHES);
                break;
        }
    }



}
