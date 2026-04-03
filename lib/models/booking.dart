import 'field.dart';
import 'user.dart';

enum BookingStatus { pending, approved, rejected }

class Booking {
  final int id;
  final String bookingCode;
  final int userId;
  final int fieldId;
  final DateTime date;
  final String startTime; // HH:mm
  final String endTime;   // HH:mm
  final int durationHours;
  final int totalPrice;
  final BookingStatus status;
  final DateTime createdAt;

  // relasi (optional, dari API dengan eager loading)
  final User? user;
  final Field? field;

  Booking({
    required this.id,
    required this.bookingCode,
    required this.userId,
    required this.fieldId,
    required this.date,
    required this.startTime,
    required this.endTime,
    required this.durationHours,
    required this.totalPrice,
    required this.status,
    required this.createdAt,
    this.user,
    this.field,
  });

  factory Booking.fromJson(Map<String, dynamic> json) => Booking(
        id: json['id'],
        bookingCode: json['booking_code'],
        userId: json['user_id'],
        fieldId: json['field_id'],
        date: DateTime.parse(json['date']),
        startTime: json['start_time'],
        endTime: json['end_time'],
        durationHours: json['duration_hours'],
        totalPrice: json['total_price'],
        status: _parseStatus(json['status']),
        createdAt: DateTime.parse(json['created_at']),
        user: json['user'] != null ? User.fromJson(json['user']) : null,
        field: json['field'] != null ? Field.fromJson(json['field']) : null,
      );

  Map<String, dynamic> toJson() => {
        'id': id,
        'booking_code': bookingCode,
        'user_id': userId,
        'field_id': fieldId,
        'date': date.toIso8601String().split('T').first,
        'start_time': startTime,
        'end_time': endTime,
        'duration_hours': durationHours,
        'total_price': totalPrice,
        'status': status.name,
        'created_at': createdAt.toIso8601String(),
      };

  static BookingStatus _parseStatus(String s) {
    switch (s) {
      case 'approved': return BookingStatus.approved;
      case 'rejected': return BookingStatus.rejected;
      default: return BookingStatus.pending;
    }
  }

  // Helper format tanggal tanpa intl
  String get formattedDate {
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    return '${date.day} ${months[date.month - 1]} ${date.year}';
  }
}
