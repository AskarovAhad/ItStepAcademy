#include <iostream>
#include <string>
using namespace std;

void DeleteComment(string& text) {
	for (int i = 0; i < text.size(); i++) {
		if ((text[i] == '/' && text[i + 1] == '/') ||
			(text[i] == '/' && text[i + 1] == '*') ||
			(text[i] == '*' && text[i + 1] == '/'))
		{
			text.erase(text.begin() + i); // 2 чтобы убрать '//' или '/**/'
			text.erase(text.begin() + i);
			text.erase(text.begin() + i); // и еще один чтобы убрать лишний пробел
		}
	}
}

int main() {
	setlocale(0, "");
//	string text{ R"(ƒан текст программы на —++.  омментарии начинаютс€ с // и продолжаютс€ до конца текущей строки
//или начинаютс€ с /* и заканчиваютс€ */. ¬ последнем
//случае комментарии могут быть в середине строки или
//располагатьс€ на нескольких строках.)" };
	string text;
	getline(cin, text);
	cout << endl << endl;
	DeleteComment(text);
	cout << text << endl << endl;
	return 0;
}