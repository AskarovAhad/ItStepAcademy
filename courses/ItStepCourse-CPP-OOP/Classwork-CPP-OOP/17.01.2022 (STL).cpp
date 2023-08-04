#define _CRT_SECURE_NO_DEPRECATE
#include <iostream>
#include <string>
#include <exception>
#include <vector>
#include <map>
#include <memory>
#include <string>
#include <iterator>
#include <fstream>
using namespace std;
class FileOpen {
	FILE* f;
public:
	FileOpen(const char* filename, const char* mode) {
		if (!(f = fopen(filename, mode))) {
			exit(0);
		}
	}
	~FileOpen() {
		fclose(f);
	}
};
void foo() {
	FileOpen file("1.txt", "w+");
}
template <class X>
class auto_ptr {
public:
	explicit auto_ptr(X* p = 0) throw() {
		ptr = p;
	}
	~auto_ptr()throw{
		delete ptr;
	}
	x* operator->()const throw() {
		return ptr;
	}
	X& operator*() const throw{
		return *ptr;
	}
	private:
	X* ptr;
};
class Date {
public:
	Date() {
		cout << "Date!" << endl;
	}
	~Date() {
		cout << "~Date!" << endl;
	}
	void Show() {
		cout << "Show date" << endl;
	}
};
template<class InIter, class Dist>
void advance(InIter& itr, Dist d);
template<class InIter>
ptrdiff_t distance(InIter& start, InIter end);




int main() {
	/*auto_ptr<Date> ptr(new Date), ptr2;
	ptr2 = ptr;
	ptr2->Show();
	Date* ptr1 = ptr2.get();
	ptr1->Show();*/

	/*string line = "Hello World";
	int wordLength = line.find(' ');
	string sub_string = line.substr(0, wordLength);
	cout << sub_string << endl;
	line.insert(wordLength, " hi");
	cout << line << endl;*/
	
	/*int count_1 = 0;
	int count_2 = 0;
	ifstream qq("d:\\aa\\file.html");
	string line;
	while (getline(qq, line)) {
		for (char x : line) {
			if (x == '<') {
				count_1++;
			}
			if (x == '>') {
				count_2++;
			}
		}
	}
	if (count_1 == count_2) {
		cout << "Valid\n";
	}
	else {
		cout << "Invalid\n";
	}*/
	
	/*map<string, string> word;
	word["CAT"] = "MUWUK";
	string wrd1, wrd2;
	cin >> wrd1 >> wrd2;
	word[wrd1] = wrd2;
	word.erase(wrd1);
	word.find(wrd1);*/

	return 0;
}