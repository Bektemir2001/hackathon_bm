/*
import 'dart:developer';

import 'package:auth/components/loading_popup.dart';
import 'package:auth/service/service.dart';
import 'package:flutter/material.dart';
import 'package:get_storage/get_storage.dart';
import 'package:grock/grock.dart';

import '../views/home.dart';

class LoginRiverpod extends ChangeNotifier{
  final service=Service();
  TextEditingController email=TextEditingController();
  TextEditingController password=TextEditingController();
  final box=GetStorage();

  void fetch(){
    loadingPopup();
    service.loginCall(email: email.text,password: password.text)
        .then((value) {
          if(value != null){
            box.write("token", value.access);
            log("Kaydedilen token => ${box.read("token")}");
            Grock.back();
            Grock.toRemove(Home());
          }else{
            Grock.back();
            Grock.snackBar(title: 'Hata', description: 'Bir sorun olustu tekrar deneyin');
          }
    });
  }

}*/
