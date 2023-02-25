import 'package:bask/fetches/fetch_favorite.dart';
import 'package:bask/fetches/size_fetch.dart';
import 'package:bask/models/general_subcategory_model.dart';
import 'package:bask/views/pages/basket.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:provider/provider.dart';

import '../../../../../fetches/product_subcategory_fetch.dart';
import '../../../../../models/product_subcategory_model.dart';
import '../../../../../models/size_model.dart';
import '../../../../../provider/selectTabProvider.dart';
import '../../../../auth/sing_in/sing_in_screen.dart';
import '../../../../home/home_screen.dart';
import '../../../../widgets/appBar.dart';
import '../../custom_navigation.dart';
import '../../full_screen_album.dart';

class Product2 extends StatefulWidget {
  final id;
  final name;
  final description;
  final price;
  final mainImage;
  final count;
  List<ColorsClass?> colors;
  Product2({Key? key,required this.name,required this.id,required this.description,required this.price,required this.mainImage,required this.count,required this.colors}) : super(key: key);

  @override
  _Product2State createState() => _Product2State();
}

class _Product2State extends State<Product2> {
  String comment =
  '''Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua tempor incididunt ut labore et dolore ''';
  List<String> userComment = [
    'Азим Дженалиев',
  ];

  var indexTemp;

  var lastCount;
  TextEditingController countField=TextEditingController();
  @override
  Widget build(BuildContext context) {
    String aboutUs =
        widget.description;
    return Scaffold(
      appBar: AllAppBar(),
      body: ListView(
            padding: EdgeInsets.symmetric(horizontal: 14).r,
            children: [
              Row(
                children: [
                  Container(
                    width: 142.w,
                    height: 142.h,
                    padding: EdgeInsets.all(9).r,
                    decoration: BoxDecoration(
                        shape: BoxShape.circle,
                        color: Color(0xFFFFFFFF),
                        boxShadow: [
                          BoxShadow(
                              blurRadius: 5,
                              offset: Offset(0, 0),
                              color: Color(0x26000000))
                        ]),
                    child: Container(
                      padding: EdgeInsets.all(9).r,
                      decoration: BoxDecoration(
                          shape: BoxShape.circle,
                          color: Color(0xFFFFFFFF),
                          boxShadow: [
                            BoxShadow(
                                blurRadius: 5,
                                offset: Offset(0, 0),
                                color: Color(0x26000000))
                          ]),
                      child: Stack(
                        //overflow: Overflow.visible,
                        children: [
                          Container(
                            padding: EdgeInsets.all(8).r,
                            decoration: BoxDecoration(
                              // color: Colors.white,
                              shape: BoxShape.circle,
                              border: Border.all(
                                  width: 0.5.w,
                                  color: Color(0xFF929292).withOpacity(0.37)),
                              boxShadow: [
                                BoxShadow(
                                    blurRadius: 16,
                                    offset: Offset(0, 0),
                                    color: Color(0x33000000))
                              ],
                              image: DecorationImage(
                                  fit: BoxFit.cover,
                                  image: NetworkImage(widget.mainImage)),
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                  SizedBox(width: 15),
                  Expanded(
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          widget.name,
                          style: TextStyle(
                            color: Color(0xFF313131),
                            fontSize: 20.sp,
                            fontWeight: FontWeight.w400,
                          ),
                        ),
                        SizedBox(height: 17.h),
                        Text(
                          widget.price.toString()+' сом',
                          style: TextStyle(
                            color: Color(0xFF313131),
                            fontSize: 24.sp,
                            fontWeight: FontWeight.w400,
                          ),
                        ),
                      ],
                    ),
                  ),
                ],
              ),
              SizedBox(height: 48.h),
              Text(
                'Описание',
                style: TextStyle(
                  color: Color(0xFF000000),
                  fontSize: 20,
                  fontWeight: FontWeight.w400,
                ),
              ),
              SizedBox(height: 10.h),
              Text(
                aboutUs,
                style: TextStyle(
                  color: Color(0xFF515151),
                  fontSize: 14.sp,
                ),
              ),
              SizedBox(height: 30.h),
              ListTile(
                leading: Text(
                  'Цвета',
                  style: TextStyle(color: Color(0xFF313131), fontSize: 16),
                ),
              ),
              Container(
                padding: EdgeInsets.only(left: 14),
                height: 90,
                child: ListView.separated(
                  scrollDirection: Axis.horizontal,
                  separatorBuilder: (context, _) => SizedBox(width: 5),
                  itemCount: widget.colors.length,
                  itemBuilder: (context, index) {
                    return GestureDetector(
                      onTap: () {

                        if(check) check=false;
                        futureSize=fetchSize(widget.id, widget.colors[index]!.colorId!.toString());
                        check=true;
                        setState(() {

                        });

                      },
                      child: Container(
                        width: 80,
                              decoration: BoxDecoration(
                                  color: Color(int.parse('0xFF${widget.colors[index]!.color!}')),
                                  boxShadow: [
                                    BoxShadow(
                                        color: Color(0x1A000000).withOpacity(0.1),
                                        blurRadius: 4,
                                        offset: Offset(0, 4)),
                                  ],
                                  border: Border.all(
                                      width: 0.5, color: Color(0xFF929292).withOpacity(0.37)),
                                  borderRadius: BorderRadius.circular(10)),
                              child: Padding(
                                padding: const EdgeInsets.all(12),
                                child: Image.network(
                                  widget.colors[index]!.image!,
                                ),
                              ),)
                    );
                        /*ColorProduct(widget.colors[index]!.image!,
                            widget.colors[index]!.color!, widget.id,
                            widget.colors[index]!.colorId!.toString())*/

                  }
                ),
              ),
              SizedBox(height: 10.h),
              if(check)
              FutureBuilder<SizeModel>(future: futureSize,builder: (context, snapshot) {
    if (snapshot.hasData &&
    snapshot.connectionState == ConnectionState.done) {
    var short=snapshot.data!.data!;
    return Column(
      children: [
        ListTile(
          leading: Text(
            'Размеры',
            style: TextStyle(color: Color(0xFF313131), fontSize: 16),
          ),
        ),

        Container(
        padding: EdgeInsets.only(left: 14),
        height: 60,
        child: ListView.separated(
        scrollDirection: Axis.horizontal,
        separatorBuilder: (context, _) => SizedBox(width: 5),
        itemCount: short.length,
        itemBuilder: (context, index) {

          return GestureDetector(
            onTap: () {

              checkSize=true;
              indexTemp=index;
              setState(() {

              });
              lastCount=short[indexTemp].count!;
            },
            child: Column(
              children: [
                Container(
                  width: 50,
                  decoration: BoxDecoration(
                      shape: BoxShape.rectangle,
                      color: Color(0xFFFFFFFF),
                      boxShadow: [
                        BoxShadow(
                            color: Color(0x1A000000).withOpacity(0.1),
                            blurRadius: 4,
                            offset: Offset(0, 4)),
                      ],
                      border: Border.all(
                          width: 0.5, color: Color(0xFF929292).withOpacity(0.37)),
                      borderRadius: BorderRadius.circular(10)),
                  child: Padding(
                      padding: const EdgeInsets.all(12),
                      child: Text(short[index].size!,style: TextStyle(fontSize: 12,fontWeight: FontWeight.bold),)
                  ),
                ),

              ],
            ),
          );

        }

        ),
        ),
        if(checkSize && indexTemp!=null)
          Text('Количество: ${short[indexTemp].count!}',style: TextStyle(fontSize: 16)),
        SizedBox(height: 10),
        if(checkSize && indexTemp!=null)
          Container(
            padding: EdgeInsets.only(left: 10),
          width: 100,
          height: 45,
          decoration: BoxDecoration(
            border: Border.all(
              width: 1,
              color: Color(0xFF225196),
            ),
            borderRadius: BorderRadius.circular(10),
          ),
          child: TextField(
            controller: countField,
            keyboardType: TextInputType.number,
            style: TextStyle(
              color: Color(0xFF225196),
              fontSize: 16,
            ),
            decoration: InputDecoration(
              hintStyle: TextStyle(
                color: Color(0xFF225196).withOpacity(0.5),
              ),
              hintText: 'Кол.',
              border: InputBorder.none,
            ),
          ),
        ),
      ],
      crossAxisAlignment: CrossAxisAlignment.start,
    );
    } else if (snapshot.hasError) {
    return Text('${snapshot.error}');
    }

    // By default, show a loading spinner.
    return Center(child: const CircularProgressIndicator());
    },
     ),
              SizedBox(height: 30.h),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  GestureDetector(
                    onTap: (){
                      print(Provider.of<SelectTabProvider>(context,listen: false).auth);
                      if(int.parse(countField.text)<lastCount){
                        if(Provider.of<SelectTabProvider>(context,listen: false).auth)
                          Navigator.of(context).push(MaterialPageRoute(builder:(context)=>Basket()));
                        else{
                          Navigator.of(context).push(MaterialPageRoute(builder:(context)=>SingInScreen()));
                        }
                      }

                    },
                      child: Container(
                        width: 150,
                          height: 45.h,
                          decoration: BoxDecoration(
                            borderRadius: BorderRadius.circular(10).r,
                            color: Color(0xFFFF6B00),
                          ),
                          child: Row(
                            children: [
                              Expanded(
                                  flex: 1,
                                  child: Icon(Icons.shopping_bag_outlined,size: 20.sp,color: Color(0xFFFFFFFF),)
                                /*Image.asset(
                                  'assets/img/category_page/homeIcon.png',
                                  width: 15,
                                  height: 15,
                                ),*/
                              ),
                              Expanded(
                                flex: 2,
                                child: Text(
                                  'В корзину',
                                  style: TextStyle(color: Color(0xFFFFFFFF), fontSize: 14.sp),
                                ),
                              ),
                            ],
                          )),
                  ),
                  GestureDetector(
                    onTap: ()async{
                      print(Provider.of<SelectTabProvider>(context,listen: false).userId);
                      fetchFavorite(Provider.of<SelectTabProvider>(context,listen: false).userId,widget.id);

                    },
                    child: Container(
                      width: 150,
                        height: 45.h,
                        decoration: BoxDecoration(
                          borderRadius: BorderRadius.circular(10).r,
                          color: Color(0xFFFF6B00),
                        ),
                        child: Row(
                          children: [
                            Expanded(
                                flex: 1,
                                child: Icon(Icons.shopping_bag_outlined,size: 20.sp,color: Color(0xFFFFFFFF),)
                              /*Image.asset(
                                  'assets/img/category_page/homeIcon.png',
                                  width: 15,
                                  height: 15,
                                ),*/
                            ),
                            Expanded(
                              flex: 2,
                              child: Text(
                                'В избранные',
                                style: TextStyle(color: Color(0xFFFFFFFF), fontSize: 14.sp),
                              ),
                            ),
                          ],
                        )),
                  ),
                ],
              ),
              SizedBox(height: 30.h),
              SizedBox(height: 69.h),
              Text(
                'Отзывы',
                style: TextStyle(
                  color: Color(0xFF000000),
                  fontSize: 20.sp,
                ),
              ),
              SizedBox(height: 21.h),
              Container(
                height: 350.h,
                child: ListView.separated(
                  physics: NeverScrollableScrollPhysics(),
                  itemCount: userComment.length,
                  separatorBuilder: (context, index) => SizedBox(height: 20.h),
                  itemBuilder: (BuildContext context, int index) => Row(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    mainAxisAlignment: MainAxisAlignment.start,
                    children: [
                      Container(
                        width: 25.w,
                        height: 25.h,
                        decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            image: DecorationImage(
                                image: AssetImage(
                                    'assets/img/category_page/comment/$index.png'))),
                      ),
                      SizedBox(width: 11.w),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(userComment[index],
                              style: TextStyle(color: Color(0xFF000000), fontSize: 12.sp)),
                          SizedBox(height: 10.h),
                          Container(
                            width: 276.w,
                            child: Text(
                              comment,
                              style: TextStyle(color: Color(0xFF000000), fontSize: 10.sp),
                            ),
                          ),
                          SizedBox(height: 8.h),
                          RatingBar.builder(
                              ignoreGestures: true,
                              allowHalfRating: true,
                              initialRating: 4.5,
                              itemSize: 12.sp,
                              itemBuilder: (context, _) => Icon(
                                Icons.star,
                                color: Color(0xFFFF0707),
                              ),
                              onRatingUpdate: (rating) {
                                setState(() {});
                              }),
                          SizedBox(height: 5.h),
                          Row(
                            children: [
                              Text('10:56',
                                  style: TextStyle(
                                      color: Color(0xFF8d8d8d), fontSize: 10.sp)),
                              SizedBox(width: 19.w),
                              Text('19.10.20',
                                  style: TextStyle(
                                      color: Color(0xFF8d8d8d), fontSize: 10.sp))
                            ],
                          ),
                        ],
                      )
                    ],
                  ),
                ),
              ),
              SizedBox(height: 26.h),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 10.0).r,
                child: Divider(
                  thickness: 1.1,
                  color: Color(0xFFdbdbdb),
                ),
              ),
              SizedBox(height: 20.h),
              Text('Поставить рейтинг и оставить отзыв',style: TextStyle(color: Color(0xFF515151),fontSize: 14),textAlign: TextAlign.center),
              SizedBox(height: 17.h),
              Center(
                child: RatingBar.builder(
                    initialRating: 1,
                    itemSize: 19,
                    itemBuilder: (context, _) => Icon(
                      Icons.star,
                      color: Color(0xFFFF6B00),
                    ),
                    onRatingUpdate: (rating) {
                      setState(() {});
                    }),
              ),
              SizedBox(height: 34.h),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 35.0).r,
                child: Container(
                  padding: EdgeInsets.symmetric(horizontal: 15),
                  height: 78.h,
                  decoration: BoxDecoration(
                      color: Color(0xFFFFFFFF),
                      borderRadius: BorderRadius.circular(10).h,
                      border: Border.all(width: 0.5,color: Color(0xff929292).withOpacity(0.37)),
                      boxShadow: [
                        BoxShadow(
                            color: Color(0x1A000000),
                            blurRadius: 4,
                            offset: Offset(0,4)
                        )
                      ]
                  ),
                  child: TextFormField(
                    decoration: InputDecoration(
                        border: InputBorder.none,
                        hintText: 'Отзыв',
                        hintStyle: TextStyle(color: Color(0xFFAFAFAF),fontSize: 14.sp)
                    ),
                  ),
                ),
              ),
              SizedBox(height: 20.h),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 110.0).r,
                child: Container(
                  width: 140.w,
                  height: 40.h,
                  decoration: BoxDecoration(
                    color: Color(0xFFFF6B00),
                    borderRadius: BorderRadius.circular(10).r,
                  ),
                  child: Center(child: Text('Отправить',style: TextStyle(color: Color(0xFFFFFFFF),fontSize: 14.sp),)),
                ),
              ),
              SizedBox(height: 100.h),
            ],
      )
    );
  }



  Widget infoWidget(String icon, String text) {
    return Expanded(
      child: Container(
        width: 145.w,
        child: Row(
          children: [
            Image.asset(
              'assets/img/category_page/infoIcons/${icon}Icon.png',
              width: 19.w,
              height: 19.h,
            ),
            SizedBox(width: 4.w),
            Text(
              text,
              style: TextStyle(
                color: Color(0xFF313131),
                fontSize: 11.sp,
              ),
            ),
          ],
        ),
      ),
    );
  }
}

late Future<SizeModel> futureSize;

bool check=false;
bool checkSize=false;
/*Widget ColorProduct(String image,String color,String productId,String colorId) {

  return GestureDetector(
    onTap: () {

      if(check) check=false;
      futureSize=fetchSize(productId, colorId);
      check=true;

    },
    child: Container(
      width: 80,
      child: Column(
        children: [
          Container(
            decoration: BoxDecoration(
                color: Color(int.parse(colorTemp)),
                boxShadow: [
                  BoxShadow(
                      color: Color(0x1A000000).withOpacity(0.1),
                      blurRadius: 4,
                      offset: Offset(0, 4)),
                ],
                border: Border.all(
                    width: 0.5, color: Color(0xFF929292).withOpacity(0.37)),
                borderRadius: BorderRadius.circular(10)),
            child: Padding(
              padding: const EdgeInsets.all(12),
              child: Image.network(
                image,
              ),
            ),
          ),
        ],
      ),
    ),
  );
}*/

Widget SizeProduct(String size) {
  return GestureDetector(
    onTap: () {
    },
    child: Container(
      width: 50,
            decoration: BoxDecoration(
              shape: BoxShape.rectangle,
                color: Color(0xFFFFFFFF),
                boxShadow: [
                  BoxShadow(
                      color: Color(0x1A000000).withOpacity(0.1),
                      blurRadius: 4,
                      offset: Offset(0, 4)),
                ],
                border: Border.all(
                    width: 0.5, color: Color(0xFF929292).withOpacity(0.37)),
                borderRadius: BorderRadius.circular(10)),
            child: Padding(
              padding: const EdgeInsets.all(12),
              child: Text(size,style: TextStyle(fontSize: 12,fontWeight: FontWeight.bold),)
          ),
    ),
  );
}