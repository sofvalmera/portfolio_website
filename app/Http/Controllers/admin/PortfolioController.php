<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Validator;
use App\Models\TempImage;
use App\Http\Controllers\admin\TempImageController;
use Illuminate\Support\Facades\File;
use Image;



class PortfolioController extends Controller
{
    //
    public function index(Request $request){
         $portfolios= Portfolio::latest();
         if(!empty($request->get('keyword'))){

            $portfolios= $portfolios->where('projectname','like','%'.$request->get('keyword').'%');
         }


        $portfolios= $portfolios->paginate(10);
        return view('admin.portfolio.list',compact('portfolios'));

    }
    public function create(){
        return view('admin.portfolio.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'projectname' => 'required',
            'projectlink' => 'required',

            
        ]);
        
        if($validator->passes()){
            $portfolio=new Portfolio();
            $portfolio->projectname = $request->projectname;
            $portfolio->projectlink = $request->projectlink;
            $portfolio->save();

            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $portfolio->id.'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/portfolio/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/portfolio/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(450, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $portfolio->image = $newImageName;
                $portfolio->save();
            }


            $request->session()->flash('success',' Added Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Added Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function edit($portfolioId, Request $request){

        $portfolio=Portfolio::find($portfolioId);

        if(empty($portfolio)){
            return redirect()->route('portfolios.index');
        }
        return view('admin.portfolio.edit',compact('portfolio'));


    }
     public function update($portfolioId, Request $request){
        $portfolio=Portfolio::find($portfolioId);

        if(empty($portfolio)){
            $request->session()->flash('error',' not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => ' not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            'projectname' => 'required',
            'projectlink' => 'required',
            
        ]);
        
        if($validator->passes()){
            $portfolio->projectname = $request->projectname;
            $portfolio->projectlink = $request->projectlink;
            $portfolio->save();

            $oldImage = $portfolio->image ;
            // =$newImageName;
            // $category->save();


            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $portfolio->id.'-'.time().'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/portfolio/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/portfolio/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(450, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $portfolio->image = $newImageName;
                $portfolio->save();

                //delete sa old pic
                File::delete(public_path().'/uploads/portfolio/thumb/'.$oldImage);
                File::delete(public_path().'/uploads/portfolio/'.$oldImage);
            }


            $request->session()->flash('success','Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => ' Updated Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function destroy($portfolioId, Request $request){
        $portfolio=Portfolio::find($portfolioId);

        if(empty($portfolio)){
            $request->session()->flash('error',' not found');
            return response()->json([
                'status' => true,
                'message' => ' not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


        File::delete(public_path().'/uploads/portfolio/thumb/'.$portfolio->image);
        File::delete(public_path().'/uploads/portfolio/'.$portfolio->image);

        $portfolio->delete();
        $request->session()->flash('success','deleted successfully');
        return response()->json([
            'status' => true,
            'message' => ' Deleted Successfully'
        ]);

    }

}
