import 'dart:convert';

import 'package:bask/models/category_model.dart';
import 'package:http/http.dart' as http;

import '../Service/base_client.dart';

Future<CategoryModel> fetchCategory() async {
  final response = await BaseClient().get('/api/category');

    return CategoryModel.fromJson(jsonDecode(response));
}
