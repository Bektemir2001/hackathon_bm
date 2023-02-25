import 'package:bask/views/pages/category/category.dart';
import 'package:flutter/cupertino.dart';



class SelectTabProvider extends ChangeNotifier{
  bool auth=false;
  String userId='';
  List<Widget> backList=[
  ];
  List<int> tabList=[
  ];
  int currentTab=0;
  Widget currentScreen = Category();
  void toggleSelect(Widget newWidget,int tab){
    if(tab==5){
      backList.add(currentScreen);
      tabList.add(currentTab);
    }
    currentScreen=newWidget;
    currentTab=tab;
    notifyListeners();
  }
  void backFun(){
    currentScreen=backList.last;
    backList.removeLast();
    currentTab=tabList.last;
    tabList.removeLast();
    notifyListeners();
  }

  void changeAuth(String userIdTemp){
    userId=userIdTemp;
    auth=true;
  }
}