import 'booking.dart';

enum PaymentMethod { bankTransfer, eWallet }
enum PaymentStatus { unpaid, paid, failed }

class Payment {
  final int id;
  final int bookingId;
  final int amount;
  final PaymentMethod method;
  final PaymentStatus status;
  final String? proofUrl;   // URL bukti pembayaran
  final DateTime? paidAt;
  final DateTime createdAt;

  // relasi
  final Booking? booking;

  Payment({
    required this.id,
    required this.bookingId,
    required this.amount,
    required this.method,
    required this.status,
    this.proofUrl,
    this.paidAt,
    required this.createdAt,
    this.booking,
  });

  factory Payment.fromJson(Map<String, dynamic> json) => Payment(
        id: json['id'],
        bookingId: json['booking_id'],
        amount: json['amount'],
        method: _parseMethod(json['method']),
        status: _parseStatus(json['status']),
        proofUrl: json['proof_url'],
        paidAt: json['paid_at'] != null ? DateTime.parse(json['paid_at']) : null,
        createdAt: DateTime.parse(json['created_at']),
        booking: json['booking'] != null ? Booking.fromJson(json['booking']) : null,
      );

  Map<String, dynamic> toJson() => {
        'id': id,
        'booking_id': bookingId,
        'amount': amount,
        'method': method == PaymentMethod.bankTransfer ? 'bank_transfer' : 'e_wallet',
        'status': status.name,
        'proof_url': proofUrl,
        'paid_at': paidAt?.toIso8601String(),
        'created_at': createdAt.toIso8601String(),
      };

  static PaymentMethod _parseMethod(String m) {
    return m == 'bank_transfer' ? PaymentMethod.bankTransfer : PaymentMethod.eWallet;
  }

  static PaymentStatus _parseStatus(String s) {
    switch (s) {
      case 'paid': return PaymentStatus.paid;
      case 'failed': return PaymentStatus.failed;
      default: return PaymentStatus.unpaid;
    }
  }
}
