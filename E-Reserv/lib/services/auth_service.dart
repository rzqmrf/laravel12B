// ============================================================
// auth_service.dart
// TODO (backend): sambungkan ke endpoint Laravel
// ============================================================

import '../models/user.dart';
import 'api_service.dart';

class AuthService {
  // Session user yang sedang login (in-memory)
  static User? _currentUser;
  static bool _isLoggedIn = false;

  static User? get currentUser => _currentUser;
  static bool get isLoggedIn => _isLoggedIn;

  // POST /api/login
  static Future<void> login({required String email, required String password}) async {
    final res = await ApiService.post('/login', {
      'email': email,
      'password': password,
    });
    
    ApiService.setToken(res['token']);
    _currentUser = User.fromJson(res['user']);
    _isLoggedIn = true;
  }

  // POST /api/register
  static Future<void> register({
    required String name,
    required String email,
    required String phone,
    required String password,
  }) async {
    final res = await ApiService.post('/register', {
      'name': name,
      'email': email,
      'phone': phone,
      'password': password,
    });
    
    ApiService.setToken(res['token']);
    _currentUser = User.fromJson(res['user']);
    _isLoggedIn = true;
  }

  // POST /api/logout
  static Future<void> logout() async {
    try {
      await ApiService.post('/logout', {});
    } catch (e) {
      // Abaikan error saat logout (misal token sudah expired)
    } finally {
      ApiService.clearToken();
      _currentUser = null;
      _isLoggedIn = false;
    }
  }

  // GET /api/user
  static Future<User?> getProfile() async {
    try {
      final res = await ApiService.get('/user');
      _currentUser = User.fromJson(res['data']);
      _isLoggedIn = true;
      return _currentUser;
    } catch (e) {
      _isLoggedIn = false;
      return null;
    }
  }
}
