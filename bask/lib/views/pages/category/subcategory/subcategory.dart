import 'package:bask/Service/base_client.dart';
import 'package:bask/fetches/category_fetch.dart';
import 'package:bask/views/pages/category/subcategory/onlySubCategory/only_subcategory.dart';
import 'package:bask/views/pages/category/subcategory/product2/product2.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';

import '../../../../fetches/subcategory_fetch.dart';
import '../../../../models/subcategory_model.dart';
import '../../../widgets/appBar.dart';


class Subcategory extends StatefulWidget {
  final id;
  final subCategoryName;
  Subcategory({Key? key, required this.id,required this.subCategoryName}) : super(key: key);


  @override
  _SubcategoryState createState() => _SubcategoryState();
}

class _SubcategoryState extends State<Subcategory> {

  late Future<SubcategoryModel> futureSubcategory;


  @override
  void initState() {
    super.initState();
    futureSubcategory = fetchSubcategory(widget.id);
  }

  String url='http://192.168.43.81:2323/';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AllAppBar(),
      backgroundColor: Colors.white,
      body: ListView(
          padding: EdgeInsets.only(left: 14, top: 5).r,
          children: [
            ListTile(
              leading: Text(widget.subCategoryName,
                  style: TextStyle(
                      color: Colors.black,
                      fontSize: 24.sp,
                      fontWeight: FontWeight.w400)),
            ),
            FutureBuilder<SubcategoryModel>(
              future: futureSubcategory,
              builder: (context, snapshot) {
                if (snapshot.hasData &&
                    snapshot.connectionState == ConnectionState.done) {
                  var items=snapshot.data!.data!.length;
                  return Padding(
                    padding: const EdgeInsets.only(right: 14.0).r,
                    child: Wrap(
                      runSpacing: 20,
                      spacing: 10,
                      children: [
                        for (var i=0;i<items;i++)
                          SlideContainer(url+snapshot.data!.data![i].image.toString(),snapshot.data!.data![i].name.toString(),snapshot.data!.data![i].id.toString())
                      ],
                    ),
                  );
                } else if (snapshot.hasError) {
                  return Text('${snapshot.error}');;
                }

                // By default, show a loading spinner.
                return Center(child: const CircularProgressIndicator());
              },
            ),]
      ),
    );
  }

  Widget SlideContainer(
      String image, String name,String id) {
    return GestureDetector(
      onTap: () =>Navigator.of(context).push(MaterialPageRoute(builder:(context)=>OnlySubcategory(id: id,subCategoryName: name,))),
      child: Container(
        width: 109.w,
        child: Column(
          children: [
            Stack(children: [
              Container(
                width: 109.w,
                height: 109.h,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10),
                    border: Border.all(
                        width: 2.5.w, color: Color(0xFF929292).withOpacity(0.37)),
                    boxShadow: [
                      BoxShadow(
                          blurRadius: 7.r,
                          offset: Offset(0, 6),
                          color: Color(0x33000000))
                    ],
                    image: DecorationImage(
                        fit: BoxFit.cover,
                        image: NetworkImage(image))),
              ),
            ]),
            SizedBox(height: 12.h),
            Text(
              name,
              style: TextStyle(color: Color(0xFF313131), fontSize: 14.sp),
            ),
          ],
        ),
      ),
    );
  }


}
