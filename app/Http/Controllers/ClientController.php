<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Session;
use Auth;
use App\Product;
use Mail;
use App\Mail\ContactUs;
use Response;

session_start();

class ClientController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //echo '<pre>';
        //print_r($user_balance);
        //exit();

        $client_content = view('client.pages.dashboard');

        return view('client.client_master')
                        ->with('client_content', $client_content);
    }

    public function users_info() {
        $users_info = DB::table('users')
                ->select('id', 'name', 'email', 'status', 'created_at')
                ->orderBy('status', 'Asc')
                ->get();

        $user_info = view('client.pages.users')
                ->with('users_info', $users_info);

        return view('client.client_master')
                        ->with('client_content', $user_info);
    }

    public function update_user(Request $request) {
        $user_id = $request->user_id;

        $data = array();
        $data['name'] = $request->p_name;

        DB::table('users')
                ->where('id', $user_id)
                ->update($data);
    }

    public function file_size() {
        $sizes_info = DB::table('file_size')
                ->select('size_id', 'size', 'updated_at')
                ->orderBy('size', 'Asc')
                ->get();

        $size_info = view('client.pages.file_size')
                ->with('sizes_info', $sizes_info);

        return view('client.client_master')
                        ->with('client_content', $size_info);
    }

    public function ajax_filesize_info_check($size) {
        $size_info = DB::table('file_size')
                ->where('size', $size)
                ->first();

        if ($size_info) {
            echo 'This File Size is Already Exists !!!';
        } else {
            echo 'This File Size is Available';
        }
    }

    public function save_file_size(Request $request) {
        $data = array();
        $data['size'] = $request->filesize;

        $size_info = DB::table('file_size')
                ->where('size', $request->filesize)
                ->first();

        if ($size_info) {
            Session::put('alert', 'This File Size is Already Exists');
        } else {
            DB::table('file_size')->insert($data);
        }

        return redirect()->back();
    }

    public function file_type() {
        $types_info = DB::table('file_type')
                ->select('type_id', 'type', 'updated_at')
                ->orderBy('type', 'Asc')
                ->get();

        $type_info = view('client.pages.file_type')
                ->with('types_info', $types_info);

        return view('client.client_master')
                        ->with('client_content', $type_info);
    }

    public function ajax_filetype_info_check($type) {
        $size_info = DB::table('file_type')
                ->where('type', $type)
                ->first();

        if ($size_info) {
            echo 'This File Type is Already Exists !!!';
        } else {
            echo 'This File Type is Available';
        }
    }

    public function save_file_type(Request $request) {
        $data = array();
        $data['type'] = $request->filetype;

        $type_info = DB::table('file_type')
                ->where('type', $request->filetype)
                ->first();

        if ($type_info) {
            Session::put('alert', 'This File Type is Already Exists');
        } else {
            DB::table('file_type')->insert($data);
        }

        return redirect()->back();
    }

    public function various_need() {
        $all_products = DB::table('products as a')
                ->join('products_image as b', 'a.product_id', '=', 'b.product_id')
                ->where('b.image_level', 1)
                ->select('a.product_id', 'a.product_name', 'a.short_description', 'b.image_option')
                ->orderBy('a.product_name', 'Asc')
                ->paginate(6);

        $various_need = view('client.pages.various_need')
                ->with('all_products', $all_products);

        return view('client.client_master')
                        ->with('client_content', $various_need);
    }

    public function search_product(Request $request) {
        $all_products = DB::table('products as a')
                ->join('products_image as b', 'a.product_id', '=', 'b.product_id')
                ->where('b.image_level', 1)
                ->where('a.product_name', 'like', "%$request->product%")
                ->select('a.product_id', 'a.product_name', 'a.short_description', 'b.image_option')
                ->orderBy('a.product_name', 'Asc')
                ->distinct()
                ->paginate(6);

        $various_need = view('client.pages.various_need')
                ->with('all_products', $all_products);

        return view('client.client_master')
                        ->with('client_content', $various_need);
    }

    public function search_pro($sorting) {
        if ($sorting == "asc") {
            $all_products = DB::table('products as a')
                    ->join('products_image as b', 'a.product_id', '=', 'b.product_id')
                    ->where('b.image_level', 1)
                    ->select('a.product_id', 'a.product_name', 'a.short_description', 'b.image_option')
                    ->orderBy('a.product_name', 'Asc')
                    ->paginate(6);
        } else {
            $all_products = DB::table('products as a')
                    ->join('products_image as b', 'a.product_id', '=', 'b.product_id')
                    ->where('b.image_level', 1)
                    ->select('a.product_id', 'a.product_name', 'a.short_description', 'b.image_option')
                    ->orderBy('a.product_name', 'Desc')
                    ->paginate(6);
        }

        $various_need = view('client.pages.various_need')
                ->with('all_products', $all_products);

        return view('client.client_master')
                        ->with('client_content', $various_need);
    }

    public function up_down_pre() {
        $sizes_info = DB::table('file_size')
                ->select('size')
                ->orderBy('size_id', 'Desc')
                ->first();

        $types_info = DB::table('file_type')
                ->select('type')
                ->orderBy('type_id', 'Desc')
                ->first();

        $img_info = DB::table('img_upload')
                ->select('id', 'caption', 'image_path')
                ->orderBy('caption', 'Asc')
                ->get();

        $up_down_pre = view('client.pages.up_down_pre')
                ->with('sizes_info', $sizes_info)
                ->with('types_info', $types_info)
                ->with('img_info', $img_info);

        return view('client.client_master')
                        ->with('client_content', $up_down_pre);
    }

    public function save_image_info(Request $request) {
        $img_size = $request->img_size;
        $img_type = $request->img_type;
        $img_caption = $request->img_caption;
        $image = $request->product_image;

        $countfiles = count($_FILES['product_image']['name']);

        if ($countfiles > 5) {
            $tcount = 5;
        } else {
            $tcount = $countfiles;
        }

        for ($i = 0; $i < $tcount; $i++) {
            if ($image) {
                $size = $_FILES['product_image']['size'][$i];
                $filename = $_FILES['product_image']['name'][$i];
                $tmp_name = $_FILES['product_image']['tmp_name'][$i];
                $type = $_FILES["product_image"]["type"][$i];

                $type_name = substr($filename, -3);

                $continue = strtolower($type_name) == strtolower($img_type) ? true : false;

                if (!$continue) {
                    $msg = "Please select " . $img_type . " file.";
                    Session::put('alert', "$msg");
                } else {
                    $continue_size = $size <= $img_size ? true : false;

                    if (!$continue_size) {
                        $msg = "Please select less than " . $this->FileSizeConvert($img_size) . " file.";
                        Session::put('alert', "$msg");
                    } else {
                        $image_full_name = $filename;
                        $upload_path = 'images/img_upload/';
                        $image_url = $upload_path . $image_full_name;
                        $success = $image[$i]->move($upload_path, $image_full_name);

                        if ($success) {
                            $idata = array();
                            $idata['caption'] = $img_caption;
                            $idata['image_path'] = $image_url;

                            DB::table('img_upload')->insert($idata);
                        }
                    }
                }
            }
        }
    }

    public function FileSizeConvert($bytes) {
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                //$result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                $result = strval(round($result, 0)) . " " . $arItem["UNIT"];
                break;
            }
        }
        return $result;
    }

    public function download_image($image_id) {
        $img_info = DB::table('img_upload')
                ->select('image_path')
                ->where('id', $image_id)
                ->first();
        $image_path = $img_info->image_path;

        $file = base_path() . "/" . $image_path;
        return Response::download($file);
    }

    public function cre_ren_del() {
        $cre_ren_del = view('client.pages.cre_ren_del');

        return view('client.client_master')
                        ->with('client_content', $cre_ren_del);
    }

    public function create_dir_info(Request $request) {
        $dir_path = $request->dir_path;

        if (!file_exists($dir_path)) {
            mkdir($dir_path, 0777, true);
            Session::put('msg', 'Directory Path is created');
        } else {
            Session::put('alert', 'This Directory Path is exists');
        }
    }

    public function rename_dir_info(Request $request) {
        $dir_path1 = $request->dir_path1;
        $dir_path2 = $request->dir_path2;

        if (!file_exists($dir_path1)) {
            Session::put('alert', 'This Directory Path is not exists');
        } else {
            rename($dir_path1, $dir_path2);
            Session::put('msg', 'Directory Path is renamed');
        }
    }

    public function delete_dir_info(Request $request) {
        $dir_path = $request->dir_path_del;

        if (!file_exists($dir_path)) {
            Session::put('alert', 'This Directory Path is not exists');
        } else {
            rmdir($dir_path);
            Session::put('msg', 'Directory Path is deleted');
        }
    }

    public function copy_dir_info(Request $request) {
        $dir_path1 = $request->dir_path_src;
        $dir_path2 = $request->dir_path_dest;

        if (!file_exists($dir_path1)) {
            Session::put('alert', 'Source Directory Path is not exists');
        } else {
            $this->custom_copy($dir_path1, $dir_path2);
            Session::put('msg', 'Directory Path is copied');
        }
    }

    public function custom_copy($src, $dst) {
        // open the source directory 
        $dir = opendir($src);

        // Make the destination directory if not exist
        mkdir($dst, 0777, true);

        // Loop through the files in source directory 
        while ($file = readdir($dir)) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {

                    // Recursively calling custom copy function 
                    // for sub directory  
                    custom_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }

        closedir($dir);
    }

    public function move_dir_info(Request $request) {
        $dir_path1 = $request->dir_path_src1;
        $dir_path2 = $request->dir_path_dest2;

        if (!file_exists($dir_path1)) {
            Session::put('alert', 'Source Directory Path is not exists');
        } else {
            rename($dir_path1, $dir_path2);
            Session::put('msg', 'Directory Path is moved');
        }
    }

    public function file_tree() {
        $file_tree = view('client.pages.file_tree');

        return view('client.client_master')
                        ->with('client_content', $file_tree);
    }
    
    public function dir_back() {
        $file_tree = view('client.pages.dir_back');

        return view('client.client_master')
                        ->with('client_content', $file_tree);
    }
}
