#include <iostream>
#include <vector>
#include <iterator>
#include <algorithm>
#include <list>
using namespace std;

class A {
public:
	void operator()() {
		cout << "NIKITA TANKIST " << count << endl;
		count++;
	}
	int operator()(int a, int b) {
		return a + b;
	}
private:
	int count = 0;
};

int main() {
	A o;
	o();
	o();
	o();
	o();
	int res = o(5, 1);
	cout << res << endl;
	return 0;
}