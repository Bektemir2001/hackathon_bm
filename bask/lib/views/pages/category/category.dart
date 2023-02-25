import 'package:bask/Service/base_client.dart';
import 'package:bask/fetches/category_fetch.dart';
import 'package:bask/views/pages/category/subcategory/subcategory.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';

import '../../../models/category_model.dart';
import '../../widgets/appBar.dart';
import 'generalSubcategory/generalSubcategory.dart';

class Category extends StatefulWidget {
  const Category({Key? key}) : super(key: key);

  @override
  _CategoryState createState() => _CategoryState();
}

class _CategoryState extends State<Category> {

  late Future<CategoryModel> futureCategory;


  @override
  void initState() {
    super.initState();
    futureCategory = fetchCategory();
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
            leading: Text('Категории',
                style: TextStyle(
                    color: Colors.black,
                    fontSize: 24.sp,
                    fontWeight: FontWeight.w400)),
          ),
          FutureBuilder<CategoryModel>(
            future: futureCategory,
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
                  SlideContainer(url+snapshot.data!.data![i].image.toString(),snapshot.data!.data![i].name.toString(),snapshot.data!.data![i].id.toString(),snapshot.data!.data![i].name.toString())
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
      String image, String name,String id,String subCategoryName) {
    return GestureDetector(
      onTap: () {
        if(int.parse(id)<3)
        Navigator.of(context).push(MaterialPageRoute(builder: (context) =>
            Subcategory(id: id, subCategoryName: subCategoryName,)));
        else{
          Navigator.of(context).push(MaterialPageRoute(builder: (context) =>GeneralSubcategory(id: id, subCategoryName: subCategoryName,)));
        }
      },
      child: Container(
        width: 109.w,
        child: Column(
          children: [
            Stack(children: [
              Container(
                width: 109.w,
                height: 109.h,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10).r,
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

  Widget SlideContainerTwo(
      int image, double rat, int otzyv, String name, int kesh) {
    return Container(
      width: 150,
      child: Column(
        children: [
          Stack(children: [
            Container(
              width: 150,
              height: 75,
              decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(10),
                  border: Border.all(
                      width: 2.5, color: Color(0xFF929292).withOpacity(0.37)),
                  boxShadow: [
                    BoxShadow(
                        blurRadius: 7,
                        offset: Offset(0, 6),
                        color: Color(0x33000000))
                  ],
                  image: DecorationImage(
                      fit: BoxFit.cover,
                      image: AssetImage('assets/img/category_page/$image.jpg'))),
            ),
          ]),
          SizedBox(height: 12),
          Row(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    name,
                    style: TextStyle(color: Color(0xFF313131), fontSize: 12),
                  ),
                  Row(
                    children: [
                      RatingBar.builder(
                          initialRating: rat,
                          itemSize: 10,
                          itemBuilder: (context, _) => Icon(
                            Icons.star,
                            color: Color(0xFFFF0707),
                          ),
                          onRatingUpdate: (rating) {
                            setState(() {
                              rat = rating;
                            });
                          }),
                      SizedBox(width: 2.5),
                      Text(
                        '$rat',
                        style:
                        TextStyle(color: Color(0xFFFF0707), fontSize: 10),
                      ),
                      SizedBox(width: 2),
                      Text(
                        '($otzyv отзыва)',
                        style:
                        TextStyle(color: Color(0xFF313131), fontSize: 10),
                      )
                    ],
                  ),
                ],
              ),
            ],
          )
        ],
      ),
    );
  }
}
