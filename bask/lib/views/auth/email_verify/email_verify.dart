import 'package:bask/fetches/email_fetch.dart';
import 'package:bask/models/email_model.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../../../provider/selectTabProvider.dart';
import '../../home/home_screen.dart';
import '../../pages/basket.dart';
import '../sing_up/sing_up_screen.dart';

class EmailVerify extends StatefulWidget {
  final email;
  const EmailVerify({Key? key,required this.email}) : super(key: key);

  @override
  _EmailVerifyState createState() => _EmailVerifyState();
}

class _EmailVerifyState extends State<EmailVerify> {
  late Future<EmailModel> futureEmailVerify;
  @override
  void initState() {
    super.initState();
    futureEmailVerify = fetchEmail(widget.email);
  }
  TextEditingController kod=TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SingleChildScrollView(
        child: FutureBuilder<EmailModel>(
          future: futureEmailVerify,
          builder: (context,snapshots) {
            return Center(
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
                      controller: kod,
                      keyboardType: TextInputType.phone,
                      style: TextStyle(
                        color: Color(0xFF225196),
                        fontSize: 16,
                      ),
                      decoration: InputDecoration(
                        hintStyle: TextStyle(
                          color: Color(0xFF225196).withOpacity(0.5),
                        ),
                        hintText: 'Код',
                        border: InputBorder.none,
                        prefixIcon: Padding(
                          padding: const EdgeInsets.only(
                              left: 18, top: 11, right: 13, bottom: 12),
                          child: Icon(Icons.password_outlined),
                        ),
                      ),
                    ),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  GestureDetector(
                    onTap: () {
                      print(snapshots.data!.data!.code);
                      if(int.parse(kod.text)==snapshots.data!.data!.code) {
                          Navigator.of(context).pushReplacement(
                              MaterialPageRoute(builder: (_) => Home()));
                          Provider.of<SelectTabProvider>(context,listen: false).changeAuth(snapshots.data!.data!.userId.toString());
                        }
                      },
                    child: Container(
                      width: 170,
                      height: 45,
                      decoration: BoxDecoration(
                          color: Color(0xFF225196),
                          borderRadius: BorderRadius.circular(30)),
                      child: Center(
                          child: Text(
                            'Подтвердить',
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

                      },
                      child: Text(
                        'Зарегистрироваться',
                        style: TextStyle(color: Color(0xFF225196), fontSize: 16),
                      )),
                ],
              ),
            );
          }
        ),
      ),
    );
  }
}
