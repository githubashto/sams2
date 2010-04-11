Summary: SAMS (Squid Account Management System)
Name: sams
Version: 1.0.3
Release: 0
Group: Applications/Internet
License: GPL
Source: http://sams.perm.ru/downloads/%{name}-%{version}.tar.gz
URL: http://sams.perm.ru
BuildRoot: %{_tmppath}/%{name}-buildroot
BuildRequires: mysql-devel
Requires: mysql
Requires: php
Requires: httpd
Requires: squid
Requires: pcre

%description
This program basically used for administrative purposes of squid proxy.
There are access control for users by ntlm, ncsa, basic or ip
authorization mode.

%prep
%setup -q -n %{name}-%{version}

%build
%configure \
	--with-configfile=%{_sysconfdir}/sams.conf \
	--with-rcd-locations=%{_sysconfdir}/rc.d/init.d \
	--with-httpd-locations=%{_var}/www/html

make

%install
rm -rf $RPM_BUILD_ROOT

mkdir -p $RPM_BUILD_ROOT%{_bindir}
mkdir -p $RPM_BUILD_ROOT%{_sysconfdir}/rc.d/init.d
mkdir -p $RPM_BUILD_ROOT%{_var}/www/html

%makeinstall \
	RCDPATH=$RPM_BUILD_ROOT%{_sysconfdir}/rc.d/init.d \
	HTTPDPATH=$RPM_BUILD_ROOT%{_var}/www/html
rm -f $RPM_BUILD_ROOT%{_var}/www/html/sams
ln -s %{_datadir}/sams $RPM_BUILD_ROOT%{_var}/www/html/

%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr(-,root,root,-)
%doc CHANGELOG INSTALL* README*
%doc doc/img
%lang(en) %doc doc/EN
%lang(ru) %doc doc/RU
%{_bindir}/*
%{_datadir}/sams
%{_sysconfdir}/rc.d/init.d/sams
%{_sysconfdir}/sams.conf
%{_var}/www/html/sams

%changelog
* Fri Jul 25 2008 Pavel Vinogradov <pavel.vinogradov@nixdev.net>
New upstream version 1.0.3

* Fri Jul 25 2008 Denis Zagirov <foomail@yandex.ru>
Fixed simlink to %{_datadir}/sams
Workaround for moving old sams.conf, ensure not to move sams.conf during rpm
build on host with working sams. (Makefile.am lines 200-203 out)

* Thu Jun 16 2005 Dmitry Chemerik <chemerik@mail.ru>
New version