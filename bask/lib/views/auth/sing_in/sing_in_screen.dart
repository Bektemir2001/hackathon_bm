import 'package:bask/views/auth/email_verify/email_verify.dart';
import 'package:flutter/material.dart';

import '../../home/home_screen.dart';
import '../sing_up/sing_up_screen.dart';

class SingInScreen extends StatefulWidget {
  const SingInScreen({Key? key}) : super(key: key);

  @override
  _SingInScreenState createState() => _SingInScreenState();
}

class _SingInScreenState extends State<SingInScreen> {
  TextEditingController t1=TextEditingController();
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SingleChildScrollView(
        child: Center(
          child: Column(
            children: [
              SizedBox(
                height: 85,
              ),
              Image.asset(
                'assets/img/logo.png',
                width: 108,
                height: 108,
              ),
              SizedBox(
                height: 34,
              ),
              SizedBox(
                height: 23,
              ),
              Container(
                width: 300,
                height: 45,
                decoration: BoxDecoration(
                  border: Border.all(
                    width: 1,
                    color: Color(0xFF225196),
                  ),
                  borderRadius: BorderRadius.circular(10),
                ),
                child: TextField(
                  controller: t1,
                  keyboardType: TextInputType.emailAddress,
                  style: TextStyle(
                    color: Color(0xFF225196),
                    fontSize: 16,
                  ),
                  decoration: InputDecoration(
                    hintStyle: TextStyle(
                      color: Color(0xFF225196).withOpacity(0.5),
                    ),
                    hintText: 'Email',
                    border: InputBorder.none,
                    prefixIcon: Padding(
                      padding: const EdgeInsets.only(
                          left: 18, top: 11, right: 13, bottom: 12),
                      child: Icon(Icons.email_outlined),
                    ),
                  ),
                ),
              ),
              SizedBox(
                height: 20,
              ),
              GestureDetector(
                onTap: () {
                  Navigator.of(context)
                      .pushReplacement(MaterialPageRoute(builder: (_) => EmailVerify(email: t1.text)));
                },
                child: Container(
                  width: 170,
                  height: 45,
                  decoration: BoxDecoration(
                      color: Color(0xFF225196),
                      borderRadius: BorderRadius.circular(30)),
                  child: Center(
                      child: Text(
                    'Добавить в корзину',
                    style: TextStyle(color: Colors.white, fontSize: 16),
                  )),
                ),
              ),
              SizedBox(
                height: 15,
              ),
              GestureDetector(
                  onTap: () {},
                  child: Text(
                    'Не можете войти?',
                    style: TextStyle(color: Color(0xFF225196), fontSize: 12),
                  )),
              SizedBox(height: 20,),
              GestureDetector(
                  onTap: () {
                    Navigator.of(context)
                        .pushReplacement(MaterialPageRoute(builder: (_) => SingUpScreen()));
                  },
                  child: Text(
                    'Зарегистрироваться',
                    style: TextStyle(color: Color(0xFF225196), fontSize: 16),
                  )),
            ],
          ),
        ),
      ),
    );
  }
}
