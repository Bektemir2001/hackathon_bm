class TaskModel {
  String? message;
  bool? status;
  Data? data;

  TaskModel({this.message, this.status, this.data});

  TaskModel.fromJson(Map<String, dynamic> json) {
    message = json['message'];
    status = json['status'];
    data = json['data'] != null ? new Data.fromJson(json['data']) : null;
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['message'] = this.message;
    data['status'] = this.status;
    if (this.data != null) {
      data['data'] = this.data!.toJson();
    }
    return data;
  }
}

class Data {
  List<NotComplated>? notComplated;

  Data({this.notComplated});

  Data.fromJson(Map<String, dynamic> json) {
    if (json['notComplated'] != null) {
      notComplated = <NotComplated>[];
      json['notComplated'].forEach((v) {
        notComplated!.add(new NotComplated.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    if (this.notComplated != null) {
      data['notComplated'] = this.notComplated!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}

class NotComplated {
  int? id;
  String? title;
  String? description;
  bool? isComplete;
  String? createdAt;

  NotComplated(
      {this.id, this.title, this.description, this.isComplete, this.createdAt});

  NotComplated.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    title = json['title'];
    description = json['description'];
    isComplete = json['isComplete'];
    createdAt = json['createdAt'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['title'] = this.title;
    data['description'] = this.description;
    data['isComplete'] = this.isComplete;
    data['createdAt'] = this.createdAt;
    return data;
  }
}
