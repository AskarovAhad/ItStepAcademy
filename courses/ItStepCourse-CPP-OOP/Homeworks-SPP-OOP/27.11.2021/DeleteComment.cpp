#include <iostream>
#include <string>
using namespace std;

void DeleteComment(string& text) {
	for (int i = 0; i < text.size(); i++) {
		if ((text[i] == '/' && text[i + 1] == '/') ||
			(text[i] == '/' && text[i + 1] == '*') ||
			(text[i] == '*' && text[i + 1] == '/'))
		{
			text.erase(text.begin() + i); // 2 ����� ������ '//' ��� '/**/'
			text.erase(text.begin() + i);
			text.erase(text.begin() + i); // � ��� ���� ����� ������ ������ ������
		}
	}
}

int main() {
	setlocale(0, "");
//	string text{ R"(��� ����� ��������� �� �++. ����������� ���������� � // � ������������ �� ����� ������� ������
//��� ���������� � /* � ������������� */. � ���������
//������ ����������� ����� ���� � �������� ������ ���
//������������� �� ���������� �������.)" };
	string text;
	getline(cin, text);
	cout << endl << endl;
	DeleteComment(text);
	cout << text << endl << endl;
	return 0;
}