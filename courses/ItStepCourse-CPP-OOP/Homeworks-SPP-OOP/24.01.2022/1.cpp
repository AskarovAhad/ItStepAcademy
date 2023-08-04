//� ���� ������ ��� ����� ����������� ������ SmsNotifier � EmailNotifier, 
//������������ ����������� � ���� SMS � e - mail ��������������, � ����� ����������� ������� ����� ��� ���.
//
//��� ���� ������� SendSms � SendEmail, ������� ���������� �������� SMS � e - mail.
//void SendSms(const string & number, const string & message);
//void SendEmail(const string& email, const string& message);
//������������:
//
//1. ����������� ������� ����� INotifier, � �������� ����� ���� 
//����� ����������� ����� void Notify(const string& message).
//
//2. ����� SmsNotifier, ������� :
//
//	�������� �������� ������ INotifier;
//
//� ������������ ��������� ���� �������� ���� string - ����� ��������;
//
//�������������� ����� Notify � �������� �� ���� ������� SendSms.
//
//3. ����� EmailNotifier, �������:
//
//�������� �������� ������ INotifier;
//
//� ������������ ��������� ���� �������� ���� string - ����� ����������� �����;
//
//�������������� ����� Notify � �������� �� ���� ������� SendEmail.

#include <iostream>
#include <string>

using namespace std;

void SendSms(const string& number, const string& message) {
	cout << "Send '" << message << "' to number " << number << endl;
}

void SendEmail(const string& email, const string& message) {
	cout << "Send '" << message << "' to e-mail " << email << endl;
}

class INotifier {
public:
	virtual void Notify(const string& mess) = 0;
};

class SmsNotifier : public INotifier {
protected:
	string number;
public:
	SmsNotifier(string num) : number(num) { }
	void Notify(const string& mess) {
		SendSms(number, mess);
	}
};

class EmailNotifier : public INotifier {
protected:
	string email;
public:
	EmailNotifier(string em) : email(em) { }
	void Notify(const string& mess) {
		SendEmail(email, mess);
	}
};

void Notify(INotifier& notifier, const string& message) {
	notifier.Notify(message);
}

int main() {
	SmsNotifier a("90 911 03 41");
	EmailNotifier b("tilestra0@gmail.com");
	Notify(a, "Move");
	Notify(b, "Numo pognali");

	// ��������� ��� �������� ����������������� ������ ����
	/*Send 'I have White belt in C++' to number + 7 - 495 - 777 - 77 - 77
	Send 'And want a Yellow one' to e - mail na - derevnyu@dedushke.ru*/
	return 0;
}

