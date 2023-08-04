//В этой задаче вам нужно разработать классы SmsNotifier и EmailNotifier, 
//отправляющие уведомления в виде SMS и e - mail соответственно, а также абстрактный базовый класс для них.
//
//Вам даны функции SendSms и SendEmail, которые моделируют отправку SMS и e - mail.
//void SendSms(const string & number, const string & message);
//void SendEmail(const string& email, const string& message);
//Разработайте:
//
//1. Абстрактный базовый класс INotifier, у которого будет один 
//чисто виртуальный метод void Notify(const string& message).
//
//2. Класс SmsNotifier, который :
//
//	является потомком класса INotifier;
//
//в конструкторе принимает один параметр типа string - номер телефона;
//
//переопределяет метод Notify и вызывает из него функцию SendSms.
//
//3. Класс EmailNotifier, который:
//
//является потомком класса INotifier;
//
//в конструкторе принимает один параметр типа string - адрес электронной почты;
//
//переопределяет метод Notify и вызывает из него функцию SendEmail.

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

	// результат для проверки работоспособности вашего кода
	/*Send 'I have White belt in C++' to number + 7 - 495 - 777 - 77 - 77
	Send 'And want a Yellow one' to e - mail na - derevnyu@dedushke.ru*/
	return 0;
}

