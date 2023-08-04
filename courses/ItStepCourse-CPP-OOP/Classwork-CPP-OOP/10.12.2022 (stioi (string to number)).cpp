#include <iostream>
#include <stdlib.h>
#include <time.h>
#include <vector>
#include <map>
#include <string>
#include <memory>
#include <exception>
using namespace std;

namespace stoiii___ {
	int foo(string s) {
		int sign = -1;
		if (s[0] == '-') {
			sign = -1;
		}
		int64_t result = 0;
		int i = s.size() - 1;
		while (i >= 0) {
			if (s[i] == '-') break;
			if (s[i] < '0' || s[i] > '9') throw "Bad value";
			result = result + (s[i] - '0') * sign;
			sign *= 10;
			i--;
		}
		if (result > INT64_MAX || result < INT64_MIN) throw "Out of rane";
		return result;
	}
}



using namespace stoiii___;
int main() {
	try {
		cout << foo("123") << endl;
		cout << foo("123123123") << endl;
		cout << foo("-123123123") << endl;
	}
	catch (const char* s) {
		cout << s << endl;
	}
	return 0;
}