import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:provider/provider.dart';
import 'provider/selectTabProvider.dart';
import 'views/splash_page/splash_page.dart';

void main() {
  runApp(const Bask());
}

class Bask extends StatelessWidget {
  const Bask({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ScreenUtilInit(
      designSize: const Size(375, 855),
      minTextAdapt: true,
      splitScreenMode: true,
      builder: (context,child){
        return MultiProvider(
          providers: [
            ChangeNotifierProvider(create: (_)=>SelectTabProvider()),
          ],
          child: MaterialApp(
            home: SplashPage(),
          ),
        );
      },
    );
  }
}
