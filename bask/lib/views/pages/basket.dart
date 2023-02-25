import 'package:flutter/material.dart';

import '../widgets/appBar.dart';


class Basket extends StatefulWidget {
  @override
  _BasketState createState() => _BasketState();
}

class _BasketState extends State<Basket> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AllAppBar(),
        backgroundColor: Colors.white,
        body: ListView(
          padding: EdgeInsets.symmetric(horizontal: 14),
          children: [
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 16.0),
              child: Text('Корзина',
                  style: TextStyle(
                      color: Colors.black,
                      fontSize: 24,
                      fontWeight: FontWeight.w400)),
            ),

          ],
        )
    );
  }
  Widget PokupkiContainer(int imageIndex,String date,String name,String plata,String ostatok){
    return Container(
      height: 86,
      decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(10),
          border: Border.all(
              width: 0.5, color: Color(0xFF929292).withOpacity(0.37)),
          boxShadow: [
            BoxShadow(
              color: Color(0x26000000),
              blurRadius: 5,
            )
          ]),
      child: Row(
        children: [
          Expanded(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Image.asset(
                  'assets/img/magazine/mag$imageIndex.png',
                  width: 90,
                  height: 30,
                ),
                SizedBox(height: 6),
                Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Image.asset(
                        'assets/img/prof/likeIcon.png',
                        width: 13,
                        height: 13,
                      ),
                      SizedBox(width: 4,),
                      Text(
                        'Оставить отзыв',
                        style: TextStyle(color: Colors.black, fontSize: 10),
                      ),
                    ]),
                Text(
                  '$dateг',
                  style:
                  TextStyle(color: Color(0xFF8D8D8D), fontSize: 10),
                )
              ],
            ),
          ),
          Padding(
            padding: EdgeInsets.symmetric(vertical: 11),
            child: VerticalDivider(
              color: Color(0xFFEBEBEB),
              width: 1,
            ),
          ),
          Expanded(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                SizedBox(height: 5),
                Text(name,style: TextStyle(color: Color(0xFF313131),fontSize: 14),),
                SizedBox(height: 14,),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Image.asset('assets/img/prof/somIcon.png',width: 15,height: 15,),
                    SizedBox(width: 5),
                    Text('$plata сом',style: TextStyle(color: Color(0xFF515151),fontSize: 10),),
                  ],
                ),
                SizedBox(height: 2),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Image.asset('assets/img/prof/somIcon2.png',width: 15,height: 15,),
                    SizedBox(width: 3),
                    Text('$ostatok сом',style: TextStyle(color: Color(0xFF515151),fontSize: 10),),
                  ],
                ),
              ],
            ),
          )
        ],
      ),
    );
  }
}