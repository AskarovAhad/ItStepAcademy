#include <iostream>
#include <complex>
using namespace std;

class Complex {
private:
	double _re;
	double _im;
public:
	Complex(double _realval, double _imvalue) :_re{ _realval }, _im{ _imvalue }{}
	Complex() :Complex{ 0,1 } {}
	double getIm() const { return _im; }
	void setIm(double im_) { _im = im_; }
	double getRe() const { return _re; }
	void getRe(double re_) { _re = re_; }
};

Complex operator+(const Complex& rhs, const Complex& lhs) {
	return{ rhs.getRe() + lhs.getRe(), rhs.getIm() + rhs.getIm() };
}
Complex operator-(const Complex& rhs, const Complex& lhs) {
	return{ rhs.getRe() - lhs.getRe(), rhs.getIm() - rhs.getIm() };
}
Complex operator*(const Complex& rhs, const Complex& lhs) {
	return{ (rhs.getRe() * lhs.getRe() - rhs.getIm() * lhs.getIm()) , (rhs.getRe() * lhs.getIm() - lhs.getRe() * rhs.getRe()) };
}
Complex operator/(const Complex& rhs, const Complex& lhs) {
	return{ (rhs.getRe() * lhs.getRe() + rhs.getIm() * lhs.getIm()) / (lhs.getRe() * lhs.getRe() + lhs.getIm() * lhs.getIm()),
		(lhs.getRe() * rhs.getIm() - rhs.getRe() * lhs.getIm()) / (lhs.getRe() * lhs.getRe() + lhs.getIm() * lhs.getIm()) };
}

int main() {
	Complex rhs{ 5,-6 };
	Complex lhs{ -3,2 };
	Complex result{ rhs + lhs };
	cout << result.getRe()  << result.getIm() << "i" << endl;
	Complex result1{ rhs - lhs };
	cout << result1.getRe() << result1.getIm() << "i" << endl;
	Complex result2{ rhs * lhs };
	cout << result2.getRe() << result2.getIm() << "i" << endl;
	Complex result3{ rhs / lhs };
	cout << result3.getRe() << result3.getIm() << "i" << endl;
	return 0;
}