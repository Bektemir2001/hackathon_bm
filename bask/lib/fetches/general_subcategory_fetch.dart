import 'dart:convert';

import 'package:bask/models/category_model.dart';
import 'package:bask/models/general_subcategory_model.dart';
import 'package:http/http.dart' as http;

import '../Service/base_client.dart';
import '../models/subcategory_model.dart';

Future<GeneralSubcategoryModel> fetchGeneralSubcategory(String id) async {
  final response = await BaseClient().get('/api/subcategory/$id');

  return GeneralSubcategoryModel.fromJson(jsonDecode(response));
}
