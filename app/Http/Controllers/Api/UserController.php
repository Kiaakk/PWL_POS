<?php
 
 namespace App\Http\Controllers\Api;
 
 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 use App\Models\UserModel;
 use Illuminate\Support\Facades\Validator;
 
 
 class UserController extends Controller
 {
     public function index(){
         return UserModel::all();
     }
     
     public function store(Request $request){
         $user = UserModel::create($request->all());
         return response()->json($user, 201);
     }
     
     public function show(UserModel $user){
         return response()->json($user);
     }
     
     public function update(Request $request, UserModel $user){
         $user->update($request->all());
         return $user;
     }
     
     public function destroy(UserModel $user){
         $user->delete();
         return response()->json([
             'success' => true,
             'message' => 'Data berhasil dihapus'
         ]);
     }

     public function __invoke(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'foto' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //if validations faild
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = UserModel::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'foto'     => $request->foto,
            'image'    => $request->image,
        ]);

        //return response JSON user is created
        if ($user) {
            return response()->json([
                'success' => true,
                'user'    => $user,
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
     }
     
 }