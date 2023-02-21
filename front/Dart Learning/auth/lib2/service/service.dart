import 'dart:developer';

import 'package:auth/model/login_model.dart';
import 'package:dio/dio.dart';
import 'package:get_storage/get_storage.dart';

import '../model/task_model.dart';

class Service{
  final String baseUrl="http://nottapp.herokuapp.com/";
  final dio=Dio();
  Future<LoginModel?> loginCall({
  required String email,
  required String password
}) async{
    Map<String,dynamic> json={
      "email":email,
      "password":password
    };
    var responce=await dio.post(baseUrl+"login",data: json);
    if(responce.statusCode==200){
      var result=LoginModel.fromJson(responce.data);
      log("Gelen Responce => ${responce.data}");
      return result;
    }else{
      throw("BIr sorun olustu ${responce.statusCode}");

    }
  }

  Future<TaskModel?> taskCall()async{
    String token=await GetStorage().read("token");
    var responce=await dio.get(baseUrl+"list",options: Options(headers: {"Authorization":"Bearer $token"}));
    if(responce.statusCode==200){
      var result=TaskModel.fromJson(responce.data);
      log("Gelen Responce => ${responce.data}");
      return result;
    }else{
      throw("BIr sorun olustu ${responce.statusCode}");

    }
  }
}