<template>
    <Head :title="`Cadastrar Tutor | ${$page.component}`" />

    <!-- Background com gradiente pastel -->
    <div
        class="min-h-screen bg-gradient-pastel-1 flex items-center justify-center p-4"
    >
        <!-- Container principal com largura expandida -->
        <div class="w-full max-w-4xl">
            <!-- Header com título e subtítulo -->
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-4"
                >
                    <svg
                        class="w-8 h-8 text-pastel-purple"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                        />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">
                    Cadastrar Novo Tutor
                </p>
            </div>

            <!-- Card do formulário -->
            <div class="card-pastel">
                <form @submit.prevent="submit" class="space-y-8">
                    <!-- Primeira linha: Nome e CPF -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Nome Completo -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-pink"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                Nome Completo
                            </label>
                            <input
                                type="text"
                                v-model="form.nome"
                                class="input-pastel"
                                placeholder="Digite o nome completo"
                                required
                                minlength="3"
                                maxlength="100"
                            />
                            <p
                                v-if="form.errors.nome"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.nome }}
                            </p>
                        </div>

                        <!-- Campo CPF -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-blue"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                    />
                                </svg>
                                CPF
                            </label>
                            <input
                                type="text"
                                v-model="form.cpf"
                                class="input-pastel"
                                placeholder="000.000.000-00"
                                required
                                @input="formatCPF"
                                maxlength="14"
                            />
                            <p
                                v-if="form.errors.cpf"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.cpf }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Apenas números (será formatado automaticamente)
                            </p>
                        </div>
                    </div>

                    <!-- Segunda linha: Telefone e Data de Nascimento -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Telefone -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-green"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                    />
                                </svg>
                                Telefone/Celular
                            </label>
                            <input
                                type="tel"
                                v-model="form.telefone"
                                class="input-pastel"
                                placeholder="(00) 00000-0000"
                                required
                                @input="formatTelefone"
                                maxlength="15"
                            />
                            <p
                                v-if="form.errors.telefone"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.telefone }}
                            </p>
                        </div>

                        <!-- Campo Data de Nascimento -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-purple"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>
                                Data de Nascimento
                            </label>
                            <input
                                type="date"
                                v-model="form.data_nascimento"
                                class="input-pastel"
                                :max="maxDate"
                                required
                            />
                            <p
                                v-if="form.errors.data_nascimento"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.data_nascimento }}
                            </p>
                        </div>
                    </div>

                    <!-- Terceira linha: Email e Gênero -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Email -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-orange"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    />
                                </svg>
                                Email
                            </label>
                            <input
                                type="email"
                                v-model="form.email"
                                class="input-pastel"
                                placeholder="exemplo@email.com"
                                required
                            />
                            <p
                                v-if="form.errors.email"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.email }}
                            </p>
                        </div>

                        <!-- Campo Gênero -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-teal"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                Gênero
                            </label>
                            <select
                                v-model="form.genero"
                                class="input-pastel"
                                required
                            >
                                <option value="">Selecione o gênero</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>
                            <p
                                v-if="form.errors.genero"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.genero }}
                            </p>
                        </div>
                    </div>

                    <!-- Quarta linha: Endereço (Cidade e Estado) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Cidade -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-yellow"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>
                                Cidade
                            </label>
                            <input
                                type="text"
                                v-model="form.cidade"
                                class="input-pastel"
                                placeholder="Digite a cidade"
                                required
                            />
                            <p
                                v-if="form.errors.cidade"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.cidade }}
                            </p>
                        </div>

                        <!-- Campo Estado -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-indigo"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"
                                    />
                                </svg>
                                Estado
                            </label>
                            <select
                                v-model="form.estado"
                                class="input-pastel"
                                required
                            >
                                <option value="">Selecione o estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI" selected>Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                            <p
                                v-if="form.errors.estado"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.estado }}
                            </p>
                        </div>
                    </div>

                    <!-- Campo Observações -->
                    <div class="form-group">
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            <svg
                                class="inline w-4 h-4 mr-2 text-pastel-pink"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />
                            </svg>
                            Observações (Opcional)
                        </label>
                        <textarea
                            v-model="form.observacoes"
                            class="input-pastel min-h-[100px] resize-none"
                            placeholder="Informações adicionais sobre o tutor, preferências, restrições, etc..."
                            rows="4"
                            maxlength="500"
                        ></textarea>
                        <p
                            v-if="form.errors.observacoes"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.observacoes }}
                        </p>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-xs text-gray-500">
                                Informações complementares sobre o tutor
                            </p>
                            <span 
                                class="text-xs text-gray-400"
                                :class="{ 'text-amber-500': form.observacoes.length > 450, 'text-red-500': form.observacoes.length >= 500 }"
                            >
                                {{ form.observacoes.length }}/500
                            </span>
                        </div>
                    </div>

                    <!-- Botões de ação -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button
                            type="submit"
                            :disabled="!isFormValid || form.processing"
                            class="btn-pastel-primary flex-1 text-lg py-4 relative"
                            :class="{
                                'opacity-50 cursor-not-allowed':
                                    !isFormValid || form.processing,
                            }"
                        >
                            <span v-if="!form.processing">
                                <svg
                                    class="inline w-5 h-5 mr-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                                    />
                                </svg>
                                Cadastrar Tutor
                            </span>
                            <div v-else class="flex items-center justify-center">
                                <div class="spinner-pastel mr-2"></div>
                                Cadastrando...
                            </div>
                        </button>
                        
                        <button
                            type="button"
                            class="btn-pastel-secondary flex-1 sm:flex-none sm:px-8 py-4"
                            @click="resetForm"
                        >
                            <svg
                                class="inline w-5 h-5 mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                />
                            </svg>
                            Limpar
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500"
                            >Informações Importantes</span
                        >
                    </div>
                </div>

                <!-- Informações sobre o cadastro -->
                <div class="bg-green-50/50 rounded-lg p-4 mb-6">
                    <div class="flex items-start space-x-3">
                        <svg
                            class="w-5 h-5 text-green-500 mt-0.5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"
                            />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">
                                Sobre o Cadastro de Tutores
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Todos os campos obrigatórios devem ser preenchidos</li>
                                <li>• O CPF será validado automaticamente</li>
                                <li>• Mantenha os dados sempre atualizados</li>
                                <li>• As informações são confidenciais e protegidas</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Links úteis -->
                <div class="text-center mt-8 space-y-2">
                    <p class="text-gray-600">
                        Já cadastrou o tutor?
                        <a
                            href="/animals/create"
                            class="text-pastel-purple font-semibold hover:underline"
                        >
                            Cadastrar animal
                        </a>
                    </p>
                    <p class="text-gray-600">
                        Quer ver todos os tutores cadastrados?
                        <a
                            href="/tutors"
                            class="text-pastel-blue font-semibold hover:underline"
                        >
                            Ver tutores cadastrados
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">
                    VetGo © 2025 — Todos os direitos reservados. <br/>
                    Projeto desenvolvido pelos alunos da Uninassau de Parnaíba.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, ref } from "vue";
import { Head } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

export default {
    components: {
        Head,
    },

    setup() {
        const form = useForm({
            nome: "",
            cpf: "",
            telefone: "",
            data_nascimento: "",
            email: "",
            genero: "",
            cidade: "",
            estado: "PI", // Piauí como padrão
            observacoes: "",
        });

        // Data máxima (hoje) para data de nascimento
        const maxDate = computed(() => {
            return new Date().toISOString().split('T')[0];
        });

        // Validação do formulário
        const isFormValid = computed(() => {
            return (
                form.nome &&
                form.cpf &&
                form.telefone &&
                form.data_nascimento &&
                form.email &&
                form.genero &&
                form.cidade &&
                form.estado
            );
        });

        // Formatação do CPF
        const formatCPF = () => {
            let cpf = form.cpf.replace(/\D/g, '');
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            form.cpf = cpf;
        };

        // Formatação do telefone
        const formatTelefone = () => {
            let telefone = form.telefone.replace(/\D/g, '');
            if (telefone.length <= 10) {
                telefone = telefone.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else {
                telefone = telefone.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
            }
            form.telefone = telefone;
        };

        const submit = () => {
            if (!isFormValid.value) return;
            
            form.post(route('tutors.store'), {
                onSuccess: () => {
                    // Lógica de sucesso se necessário
                },
                onError: (errors) => {
                    // Tratar erros se necessário
                },
            });
        };

        const resetForm = () => {
            form.reset();
            form.estado = "PI"; // Resetar para Piauí como padrão
        };

        return {
            form,
            maxDate,
            isFormValid,
            formatCPF,
            formatTelefone,
            submit,
            resetForm,
        };
    },
};
</script>