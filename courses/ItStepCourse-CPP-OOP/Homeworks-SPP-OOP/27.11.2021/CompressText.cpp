#include <iostream>
#include <string>
using namespace std;

void Compress(string& text) {
	for (int i = text.size() - 1; i >= 1; --i) {
		if (text[i] == ' ' && text[i - 1] == ' ') {
			text.erase(text.begin() + i);
		}
	}
	if (text[0] == ' ') {
		text.erase(text.begin());
	}
}
int main() {
	setlocale(0, "");
	string text;
	getline(cin, text);
	cout << text << endl << endl;
	Compress(text);
	cout << text;
	return 0;
}