import 'dart:convert';

import 'package:bask/views/pages/category/category.dart';
import 'package:bask/views/pages/favorite.dart';
import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:provider/provider.dart';
import '../../Service/base_client.dart';
import '../../models/category_model.dart';
import '../../provider/selectTabProvider.dart';
import '../auth/sing_in/sing_in_screen.dart';
import '../pages/basket.dart';
import '../pages/notifications.dart';
import '../pages/profile/profile.dart';

class Home extends StatefulWidget {
  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {
  final List<Widget> screens = [
    Category(),
    Basket(),
    Profile(),
  ];
  final PageStorageBucket bucket = PageStorageBucket();


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: PageStorage(
        child: Provider.of<SelectTabProvider>(context).currentScreen,
        bucket: bucket,
      ),
      //floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomAppBar(
        shape: CircularNotchedRectangle(),
        // notchMargin: 10,
        child: Container(
          height: 60.h,
          child: Row(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: <Widget>[
              MaterialButton(
                minWidth: 40,
                onPressed: () {
                  Provider.of<SelectTabProvider>(context, listen: false)
                      .toggleSelect(Category(),
                          1); // if user taps on this dashboard tab will be active

                },
                child: Column(
                  children: [
                    Icon(
                      Icons.category_outlined,
                      color: Provider.of<SelectTabProvider>(context).currentTab == 1
                          ? Color(0xFFFF6B00)
                          : Color(0xFF225196),
                    ),
                    Text('Категории',style: TextStyle(fontSize: 10.sp,color: Provider.of<SelectTabProvider>(context).currentTab == 1
                        ? Color(0xFFFF6B00)
                        : Color(0xFF225196),))
                  ],
                ),
              ),

              MaterialButton(
                minWidth: 40,
                onPressed: () {
                  if(Provider.of<SelectTabProvider>(context,listen: false).auth)
                  Provider.of<SelectTabProvider>(context, listen: false)
                      .toggleSelect(Basket(),
                      2); // if user taps on this dashboard tab will be active
                  else{
                    print('error basket');
                    Navigator.of(context).push(MaterialPageRoute(builder:(context)=>SingInScreen()));
                  }
                },
                child: Column(
                  children: [
                    Icon(
                      Icons.shopping_bag_outlined,
                      color: Provider.of<SelectTabProvider>(context).currentTab == 2
                          ? Color(0xFFFF6B00)
                          : Color(0xFF225196),
                    ),
                    Text('Корзина',style: TextStyle(fontSize: 10.sp,color: Provider.of<SelectTabProvider>(context).currentTab == 2
                        ? Color(0xFFFF6B00)
                        : Color(0xFF225196),))
                  ],
                ),
              ),

              // Right Tab bar icons

              MaterialButton(
                minWidth: 40,
                onPressed: () {
                  Provider.of<SelectTabProvider>(context, listen: false)
                      .toggleSelect(Favorite(),
                          3); // if user taps on this dashboard tab will be active
                },
                child: Column(
                  children: [
                    Icon(
                      Icons.favorite_border_outlined,
                      color: Provider.of<SelectTabProvider>(context).currentTab == 3
                          ? Color(0xFFFF6B00)
                          : Color(0xFF225196),
                    ),
                    Text('Избранное',style: TextStyle(fontSize: 10.sp,color: Provider.of<SelectTabProvider>(context).currentTab == 3
                        ? Color(0xFFFF6B00)
                        : Color(0xFF225196),))
                  ],
                ),
              ),
              MaterialButton(
                minWidth: 40,
                onPressed: () async {
                  Provider.of<SelectTabProvider>(context, listen: false)
                      .toggleSelect(Profile(),
                          4); // if user taps on this dashboard tab will be active

                },
                child: Column(
                  children: [
                    Icon(
                      Icons.perm_identity_outlined,
                      color: Provider.of<SelectTabProvider>(context).currentTab == 4
                          ? Color(0xFFFF6B00)
                          : Color(0xFF225196),
                    ),
                    Text('Профиль',style: TextStyle(fontSize: 10.sp,color: Provider.of<SelectTabProvider>(context).currentTab == 4
                        ? Color(0xFFFF6B00)
                        : Color(0xFF225196),),)
                  ],
                ),
              )
            ],
          ),
        ),
      ),
    );
  }
}
