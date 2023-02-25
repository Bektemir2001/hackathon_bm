import 'dart:convert';

import 'package:bask/models/category_model.dart';
import 'package:bask/models/email_model.dart';
import 'package:bask/models/general_subcategory_model.dart';
import 'package:http/http.dart' as http;

import '../Service/base_client.dart';
import '../models/subcategory_model.dart';

Future<EmailModel> fetchEmail(String email) async {
  var json={
    'email': email
  };
  final response = await BaseClient().post('/api/fast_register/',json);

  return EmailModel.fromJson(jsonDecode(response));
}
