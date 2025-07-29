#!/bin/bash

# Script para configurar permissões de diretórios de upload
# Este script deve ser executado após fazer build do projeto

echo "Configurando permissões para upload de imagens..."

# Criar diretório se não existir
mkdir -p assets/images/courses

# Configurar permissões
chmod 775 assets/images/courses
chmod -R 775 assets/images/

echo "Permissões configuradas com sucesso!"
echo "Diretório assets/images/courses/ agora tem permissão 775"
