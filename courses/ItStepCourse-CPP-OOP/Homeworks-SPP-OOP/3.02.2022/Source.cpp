//#include <iostream>
//#include <iterator>
//#include <vector>
//#include <set>
//
//using namespace std;
//
//template <typename T>
//
//vector<T> foo(const set<T>& elements, const T& border) {
//	vector<T> new_vec;
//	for (typename T::iterator it = elements.begin(); it != elements.end(); ++it) {
//		if (*it > border) {
//			new_vec.push_back(*it);
//		}
//	}
//	return new_vec;
//}
//
//int main() {
//	set<int> v{ 1,2,3,6,7,8 };
//	for (int x : foo(v, 5)) {
//		cout << x << " ";
//	}
//	cout << endl << endl;
//	string to_find = "aa";
//	cout << foo(set <string> { "dd", "a", "aaa", "cccc" }, to_find).size();;
//	cout << endl;
//	return 0;
//}