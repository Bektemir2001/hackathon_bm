import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';


import '../../widgets/appBar.dart';

class Profile extends StatefulWidget {
  @override
  _ProfileState createState() => _ProfileState();
}

class _ProfileState extends State<Profile> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AllAppBar(),
      body: ListView(
        padding: EdgeInsets.only(left: 14, right: 14, top: 5),
        children: [
          Container(
            width: 142,
            height: 142,
            padding: EdgeInsets.all(9),
            decoration: BoxDecoration(
                shape: BoxShape.circle,
                color: Colors.white,
                boxShadow: [
                  BoxShadow(
                      blurRadius: 5,
                      offset: Offset(0, 0),
                      color: Color(0x26000000))
                ]),
            child: Container(
              padding: EdgeInsets.all(9),
              decoration: BoxDecoration(
                  shape: BoxShape.circle,
                  color: Colors.white,
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
                    padding: EdgeInsets.all(8),
                    decoration: BoxDecoration(
                      color: Colors.white,
                      shape: BoxShape.circle,
                      border: Border.all(
                          width: 0.5,
                          color: Color(0xFF929292).withOpacity(0.37)),
                      boxShadow: [
                        BoxShadow(
                            blurRadius: 16,
                            offset: Offset(0, 0),
                            color: Color(0x33000000))
                      ],
                    ),
                  ),
                ],
              ),
            ),
          ),
          SizedBox(height: 4),
          Text(
            'User',
            style: TextStyle(color: Colors.black, fontSize: 20),
            textAlign: TextAlign.center,
          ),
          SizedBox(height: 15),
          Container(
            height: 80,
            decoration: BoxDecoration(
              color: Color(0xFF313131),
              borderRadius: BorderRadius.circular(10),
            ),
            child: Row(
              children: [
                Expanded(
                  child: Container(
                    child: Stack(
                      children: [
                        Positioned(
                            child: Image.asset(
                              'assets/img/profIconTab1.png',
                              width: 72,
                              height: 72,
                            ),
                            bottom: -28,
                            left: 15),
                        Positioned(
                          top: 20,
                          left: 30,
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.center,
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Text('14',
                                  style: TextStyle(
                                      color: Colors.white, fontSize: 20)),
                              Text(
                                'покупок',
                                style: TextStyle(
                                    color: Colors.white, fontSize: 10),
                              )
                            ],
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
                Padding(
                  padding: EdgeInsets.symmetric(vertical: 11),
                  child: VerticalDivider(
                    color: Color(0xFF636363),
                    width: 1,
                  ),
                ),
                Expanded(
                  child: Container(
                    child: Stack(
                      children: [
                        Positioned(
                            child: Image.asset(
                              'assets/img/profIconTab2.png',
                              width: 72,
                              height: 72,
                            ),
                            bottom: -28,
                            left: 15),
                        Positioned(
                          top: 15,
                          left: 22,
                          child: Container(
                            width: 70,
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.center,
                              mainAxisAlignment: MainAxisAlignment.center,
                              children: [
                                Text('21 834',
                                    style: TextStyle(
                                        color: Colors.white, fontSize: 20)),
                                Text(
                                  'общая сумма покупок',
                                  textAlign: TextAlign.center,
                                  style: TextStyle(
                                      color: Colors.white, fontSize: 10),
                                )
                              ],
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
                Padding(
                  padding: EdgeInsets.symmetric(vertical: 11),
                  child: VerticalDivider(
                    color: Color(0xFF636363),
                    width: 1,
                  ),
                ),
                Expanded(
                  child: Container(
                    child: Stack(
                      children: [
                        Positioned(
                            child: Image.asset(
                              'assets/img/profIconTab3.png',
                              width: 72,
                              height: 72,
                            ),
                            bottom: -28,
                            left: 15),
                        Positioned(
                          top: 20,
                          left: 30,
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.center,
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Text('1520',
                                  style: TextStyle(
                                      color: Colors.white, fontSize: 20)),
                              Text(
                                'на счету',
                                style: TextStyle(
                                    color: Colors.white, fontSize: 10),
                              )
                            ],
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
              ],
            ),
          ),


        ],
      ),
    );
  }}