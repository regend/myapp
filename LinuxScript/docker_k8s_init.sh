sed -i '$aproxy=http://10.10.17.8:808/' /etc/yum.conf
yum install -y yum-utils device-mapper-persistent-data lvm2
yum-config-manager --enable extras
yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
yum-config-manager --enable docker-ce-edge
yum install -y https://download.docker.com/linux/centos/7/x86_64/stable/Packages/docker-ce-selinux-17.03.2.ce-1.el7.centos.noarch.rpm
yum install -y docker-ce-17.03.2.ce-1.el7.centos
mkdir /etc/docker
cat <<EOF > /etc/docker/daemon.json
{
    "insecure-registries": [
        "10.10.89.23:5000"
    ],
    "graph": "/data/docker",
    "storage-driver": "devicemapper"
}

EOF
mkdir -p /etc/systemd/system/docker.service.d
touch /etc/systemd/system/docker.service.d/http-proxy.conf
cat <<EOF > /etc/systemd/system/docker.service.d/http-proxy.conf
[Service]
Environment="HTTP_PROXY=http://10.10.17.8:808/" "HTTPS_PROXY=httpS://10.10.17.8:808/"
EOF
systemctl daemon-reload
systemctl start docker
systemctl enable docker
source /usr/share/bash-completion/completions/docker
source /usr/share/bash-completion/bash_completion

cat <<EOF > /etc/yum.repos.d/kubernetes.repo
[kubernetes]
name=Kubernetes
baseurl=https://packages.cloud.google.com/yum/repos/kubernetes-el7-x86_64
enabled=1
gpgcheck=1
repo_gpgcheck=1
gpgkey=https://packages.cloud.google.com/yum/doc/yum-key.gpg https://packages.cloud.google.com/yum/doc/rpm-package-key.gpg
EOF
setenforce 0
yum install -y kubelet kubeadm kubectl
systemctl enable kubelet && systemctl start kubelet
echo "source <(kubectl completion bash)" >> ~/.bashrc
swapoff -a