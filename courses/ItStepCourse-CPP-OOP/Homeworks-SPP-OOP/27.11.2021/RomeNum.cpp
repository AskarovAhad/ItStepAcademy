#include <iostream>
#include <string> 

using namespace std;

string Rome(int num) {
	string rome_num;
	while (num != 0) {
		if (num >= 1000) {
			rome_num.push_back('M');
			num -= 1000;
		}
		else if (num >= 900 && num < 1000) {
			rome_num.push_back('C'); rome_num.push_back('M');
			num -= 900;
		}
		else if (num < 900 && num >= 500) {
			rome_num.push_back('D');
			num -= 500;
		}
		else if (num >= 400 && num < 500) {
			rome_num.push_back('C'); rome_num.push_back('D');
			num -= 400;
		}
		else if (num < 400 && num >= 100) {
			rome_num.push_back('C');
			num -= 100;
		}
		else if (num >= 90 && num < 100) {
			rome_num.push_back('X');
			rome_num.push_back('C');
			num -= 90;
		}
		else if (num < 100 && num >= 50) {
			rome_num.push_back('L');
			num -= 50;
		}
		else if (num >= 40 && num < 50) {
			rome_num.push_back('X');
			rome_num.push_back('L');
			num -= 40;
		}
		else if (num < 40 && num > 10) {
			rome_num.push_back('X');
			num -= 10;
		}
		else if (num >= 5 && num < 10) {
			rome_num.push_back('V');
			num -= 5;
		}
		else if (num == 4) {
			rome_num.push_back('I');
			rome_num.push_back('V');
			num -= 4;
		}
		else if (num < 4 && num > 0) {
			rome_num.push_back('I');
			num -= 1;
		}
	}
	return rome_num;
}
int main() {
	int num;
	cin >> num;
	cout << num << " - " << Rome(num) << endl;
	return 0;
}