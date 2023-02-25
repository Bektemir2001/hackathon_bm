import 'package:bask/Service/base_client.dart';
import 'package:bask/fetches/category_fetch.dart';
import 'package:bask/models/general_subcategory_model.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:provider/provider.dart';

import '../../../../fetches/general_subcategory_fetch.dart';
import '../../../widgets/appBar.dart';
import '../product.dart';


class GeneralSubcategory extends StatefulWidget {
  final id;
  final subCategoryName;
  GeneralSubcategory({Key? key, required this.id,required this.subCategoryName}) : super(key: key);


  @override
  _GeneralSubcategoryState createState() => _GeneralSubcategoryState();
}

class _GeneralSubcategoryState extends State<GeneralSubcategory> {

  late Future<GeneralSubcategoryModel> futureGeneralSubcategory;


  @override
  void initState() {
    super.initState();
    futureGeneralSubcategory = fetchGeneralSubcategory(widget.id);
  }


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
            FutureBuilder<GeneralSubcategoryModel>(
              future: futureGeneralSubcategory,
              builder: (context, snapshot) {
                if (snapshot.hasData &&
                    snapshot.connectionState == ConnectionState.done) {
                  var items=snapshot.data!.data!.length;
                  var short=snapshot.data!.data!;
                  return /*ListView.builder(
                    padding: const EdgeInsets.only(right: 14.0).r,
                      itemCount: items,
                      itemBuilder: (context, index) {
                        return SlideContainer(snapshot.data!.data![index].image.toString(),snapshot.data!.data![index].name.toString());
                      },
                    );*/
                    Wrap(
                      runSpacing: 20,
                      spacing: 10,
                      children: [
                        for (var i=0;i<items;i++)
                          SlideContainer(short[i].image.toString(),short[i].name.toString(),short[i].description.toString(),short[i].price!,short[i].count!)
                      ],
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
      String image, String name,String description,int price,int count) {
    return GestureDetector(
      onTap: ()=>Navigator.of(context).push(MaterialPageRoute(builder:(context)=>Product(name: name,description: description,price: price,count: count,mainImage: image,))),
      child: Container(
        child: Row(
          children: [
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
            SizedBox(width: 12.w),
            Expanded(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    name,
                    style: TextStyle(color: Color(0xFF313131), fontSize: 14.sp),
                  ),
                  SizedBox(height: 12.h),
                  Text(description,softWrap: true,
                    maxLines: 2,
                    overflow: TextOverflow.ellipsis,)
                ],
              ),
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
