class SizeModel {
  List<Data>? data;

  SizeModel({this.data});

  SizeModel.fromJson(Map<String, dynamic> json) {
    if (json['data'] != null) {
      data = <Data>[];
      json['data'].forEach((v) {
        data!.add(new Data.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    if (this.data != null) {
      data['data'] = this.data!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}

class Data {
  int? sizeId;
  String? size;
  int? count;

  Data({this.sizeId, this.size, this.count});

  Data.fromJson(Map<String, dynamic> json) {
    sizeId = json['size_id'];
    size = json['size'];
    count = json['count'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['size_id'] = this.sizeId;
    data['size'] = this.size;
    data['count'] = this.count;
    return data;
  }
}
